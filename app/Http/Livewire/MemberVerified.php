<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MemberVerified extends Component
{
    protected $listeners = ['member.verified.refresh' => 'reload'];

    public $member;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function reload()
    {
        $this->member->refresh();
    }

    public function setVerified()
    {
        if (auth()->user() && auth()->user()->allow('member-region', 'member-manager'))
        {
            \DB::beginTransaction();

            $this->member->verified_at = now();
            $this->member->save();

            $message = "Anggota [". $this->member->number_view ."] ter-aktivasi.";

            $this->member->setCommentLog($message);

            \DB::commit();

            $this->emit('premium.verified.refresh');

            $this->emit('app.notify', [
                "title" => "Aktivasi sukses",
                "message" => $message,
                "type" => "success"
            ]);
        }
        else {
            $this->emit('app.notify', [
                "title" => "Aktivasi gagal",
                "message" => "Tidak ada permission",
                "type" => "error"
            ]);
        }
    }

    public function render()
    {
        return view('livewire.member-verified');
    }
}
