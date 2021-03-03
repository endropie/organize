<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Member;
use App\Models\Premium;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class MemberRegister extends Component
{
    use WithFileUploads;

    public $additional = false;

    public $premium = null;

    public $photo_member;

    public $record = [
        'premium' => [
            'number' => null,
            'region_id' => null,
        ],
        'number' => null,
        'name' => null,
        'gender' => null,
        'birth_place' => null,
        'birth_date' => null,
        'contact_code' => '62',
        'contact' => null,
        'address' => null,
        'relate' => null,
    ];

    protected $validationAttributes = [
        'record.premium.number' => 'No. KK',
        'record.premium.region_id' => 'Regional',
        'record.number' => 'NIK',
        'record.name' => 'Nama',
        'record.gender' => 'Kelamin',
        'record.birth_place' => 'Tempat lahir',
        'record.birth_date' => 'Tanggal lahir',
        'record.contact_code' => 'Kode Negara',
        'record.contact' => 'No. Kontak',
        'record.relate' => 'Jenis Keangotaan',
        'photo_member' => 'Photo KTP',
    ];

    public function mount()
    {
        if($premium = request('premium', null))
        {
            $premium = Premium::findOrFail($premium);
            $this->additional = true;
            $this->premium = $premium;
            $this->record['premium']['number'] = $premium->number;
            $this->record['premium']['region_id'] = $premium->region_id;
        }
    }

    public function updated($name, $value)
    {
        if(\Str::of($name)->startsWith('record'))
        {
            $this->validateOnly($name);
        }
        if(\Str::of($name)->startsWith('photo_'))
        {
            $this->validateOnly($name);
        }
    }

    public function changedPremium ()
    {
        $premium = Premium::where('number', $this->record['premium']['number'])->get()->first();
        if(strlen($this->record['premium']['number']) && $premium) {
            $this->premium = $premium;
            $this->record['premium']['region_id'] = $premium->region_id;
        }
        else {
            $this->premium = null;
        }
    }

    protected function rules ()
    {

        $age = \Carbon\Carbon::parse($this->record['birth_date'])->age;

        return [
            'record.premium.number' => 'required',
            'record.premium.region_id' => 'required',
            'record.number' => 'required|unique:App\Models\Member,number',
            'record.name' => 'required',
            'record.gender' => 'required',
            'record.birth_place' => 'required',
            'record.birth_date' => 'required',
            'record.contact' => "unique:App\Models\Member,contact|" . ($this->additional ? '' : 'required'),
            'record.contact_code' => ($this->additional ? '' : '|required'),
            'record.relate' => 'required',
            'photo_member' => ($age < 20 ? '' : 'required'),
        ];
    }

    public function save ()
    {
        $this->validate();

        DB::beginTransaction();

        $premium = Premium::firstOrCreate(['number' => $this->record['premium']['number']], $this->record['premium']);

        $member = $premium->members()->create($this->record);

        if ($this->photo_member)
        {
            $name = $member->number ."-". now()->format('YmdHisu') .".". $this->photo_member->extension();
            $this->photo_member->storeAs('public/register/members', $name);
            $this->saveImage($this->photo_member, 'public/register/members', $name);
            $member->capture_name = $name;
            $member->save();
        }


        DB::commit();

        redirect()->route('members.premium', ['premium' => $premium->id]);
    }

    public function saveImage($image, $path = 'public/register', $name)
    {

        if ($image)
        {
            $original = $image->storeAs($path, "original-$name");

            $img = Image::make(Storage::get($original));

            $size = getimagesize(Storage::path($original));

            // $isPotrait =  $size[0] < $size[1];


            if ($img->width() > 960 || $img->height() > 680) {
                $img->resize(900, 680, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // if ($isPotrait) $img->rotate(90);
            }

            $compress = $img->save(Storage::path($path) ."/". $name, 80);

            Storage::delete($original);
        }
        else dd('NO IMAGE');
    }

    public function render()
    {
        return view('livewire.member-register', [
            'region_options' => Region::get(),
            'relate_options' => Member::$RELATES,
            'phone_codes' => Country::orderBy('phonecode')->get()
        ]);
    }
}
