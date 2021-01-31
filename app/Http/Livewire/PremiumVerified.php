<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PremiumVerified extends Component
{
    protected $listeners = ['premium.verified.refresh' => 'reload'];

    public $premium;

    public function mount($premium)
    {
        $this->premium = $premium;
    }

    public function reload()
    {
        $this->premium->refresh();
    }

    public function setVerified()
    {
        if (auth()->user() && auth()->user()->allowRegion('member-region', $this->premium->region))
        {
            \DB::beginTransaction();

            $this->premium->verified_at = now();
            $this->premium->save();

            $message = "KK [". $this->premium->number_view ."] ter-verifikasi.";

            $this->premium->setCommentLog($message);

            \DB::commit();

            $this->emit('member.verified.refresh');

            $this->emit('webiste.notify', [
                "title" => "Verifikasi sukses",
                "message" => $message,
                "type" => "success"
            ]);
        }
        else {
            $this->emit('webiste.notify', [
                "title" => "Verifikasi gagal",
                "message" => "Tidak ada permission",
                "type" => "success"
            ]);
        }
    }

    public function render()
    {
        return view('livewire.premium-verified');
    }
}
