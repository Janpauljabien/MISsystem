<?php

namespace App\Livewire\Task;

use App\Events\RequestEventMis;
use App\Models\Request;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;


class AddTask extends Component
{
    #[On('add-task')]
    public function addTask($request_id, $tech_id)
    {


        $existingTask = Task::where('request_id', $request_id) 
            ->where('technicalStaff_id', $tech_id)
            ->first(); //check if tech staff exist in this task

        /////////////////////////////
        if ($existingTask) {
            // If task exists, delete it
            $existingTask->delete();
            $this->dispatch('success', name: 'successfully removed');
        } else {
            // If task does not exist, create and save it
            $task = Task::create([
                'request_id' => $request_id,
                'technicalStaff_id' => $tech_id,

            ]);
            $this->dispatch('success', name:'successfully added');
        }



        $request = Request::find($request_id); //for live update

        $numOfTechInTask = Task::where('request_id', $request_id)->count(); //total number of request in task
        //////////////////////////////
        if ($numOfTechInTask > 0) {
            $request->status = 'pending';
            $request->save();
        } else {
            $request->status = 'waiting';
            $request->save();
        }

        /////////////////////////////
        RequestEventMis::dispatch(null, $request->faculty_id);
        RequestEventMis::dispatch(null, $tech_id);
    }



    public function render()
    {
        return view('livewire.task.add-task');
    }
}
