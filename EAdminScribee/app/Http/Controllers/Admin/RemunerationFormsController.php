<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRemunerationFormRequest;
use App\Http\Requests\StoreRemunerationFormRequest;
use App\Http\Requests\UpdateRemunerationFormRequest;
use App\RemunerationForm;
use App\Role;
use App\Services\AuditLogService;
use App\Status;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemunerationFormsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('remuneration_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remunerationForms = RemunerationForm::with('status', 'chairman', 'dean', 'exam_controller')->get();
        $defaultStatus    = Status::find(1);
        $user             = auth()->user();

        return view('admin.remunerationForms.index', compact('remunerationForms', 'defaultStatus', 'user'));
    }

    public function create()
    {
        abort_if(Gate::denies('remuneration_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.remunerationForms.create');
    }

    public function store(StoreRemunerationFormRequest $request)
    {
        $data = $request->validated();

        // Create a new RemunerationForm instance
        $remunerationForm = new RemunerationForm();

        // Assign form data to the remuneration form
        $remunerationForm->examiner = $data['examiner'];
        $remunerationForm->term = $data['term'];
        $remunerationForm->year = $data['year'];
        $remunerationForm->batch = $data['batch'];
        $remunerationForm->exam_type = $data['exam_type'];
        $remunerationForm->exam_date_theory = $data['exam_date_theory'] ?? null;
        $remunerationForm->exam_date_practical = $data['exam_date_practical'] ?? null;
        $remunerationForm->ref = $data['ref'];
        $remunerationForm->date = $data['date'];
        $remunerationForm->subject = $data['subject'];

        // Assign the quantities, rates, and amounts manually
        $remunerationForm->quantity1 = $data['quantity1'] ?? 0;
        $remunerationForm->rate1 = $data['rate1'] ?? 0;
        $remunerationForm->amount1 = $remunerationForm->quantity1 * $remunerationForm->rate1;

        $remunerationForm->quantity2 = $data['quantity2'] ?? 0;
        $remunerationForm->rate2 = $data['rate2'] ?? 0;
        $remunerationForm->amount2 = $remunerationForm->quantity2 * $remunerationForm->rate2;

        $remunerationForm->quantity3 = $data['quantity3'] ?? 0;
        $remunerationForm->rate3 = $data['rate3'] ?? 0;
        $remunerationForm->amount3 = $remunerationForm->quantity3 * $remunerationForm->rate3;

        $remunerationForm->quantity4 = $data['quantity4'] ?? 0;
        $remunerationForm->rate4 = $data['rate4'] ?? 0;
        $remunerationForm->amount4 = $remunerationForm->quantity4 * $remunerationForm->rate4;

        $remunerationForm->quantity5 = $data['quantity5'] ?? 0;
        $remunerationForm->rate5 = $data['rate5'] ?? 0;
        $remunerationForm->amount5 = $remunerationForm->quantity5 * $remunerationForm->rate5;

        $remunerationForm->quantity6 = $data['quantity6'] ?? 0;
        $remunerationForm->rate6 = $data['rate6'] ?? 0;
        $remunerationForm->amount6 = $remunerationForm->quantity6 * $remunerationForm->rate6;

        $remunerationForm->quantity7 = $data['quantity7'] ?? 0;
        $remunerationForm->rate7 = $data['rate7'] ?? 0;
        $remunerationForm->amount7 = $remunerationForm->quantity7 * $remunerationForm->rate7;

        $remunerationForm->quantity8 = $data['quantity8'] ?? 0;
        $remunerationForm->rate8 = $data['rate8'] ?? 0;
        $remunerationForm->amount8 = $remunerationForm->quantity8 * $remunerationForm->rate8;

        $remunerationForm->quantity9 = $data['quantity9'] ?? 0;
        $remunerationForm->rate9 = $data['rate9'] ?? 0;
        $remunerationForm->amount9 = $remunerationForm->quantity9 * $remunerationForm->rate9;
        $remunerationForm->in_words = $data['in_words'];
        // Calculate the total amount
        $remunerationForm->total_amount = $remunerationForm->amount1 + $remunerationForm->amount2 + $remunerationForm->amount3 +
                                          $remunerationForm->amount4 + $remunerationForm->amount5 + $remunerationForm->amount6 +
                                          $remunerationForm->amount7 + $remunerationForm->amount8 + $remunerationForm->amount9;

        // Deduction and net amount
        $remunerationForm->deduction = $data['deduction'] ?? 0;
        $remunerationForm->net_amount =  $data['net_amount'];

        // Save the remuneration form
        $remunerationForm->save();

        // Redirect or return a response
        return redirect()->route('admin.remuneration-forms.index')->with('success', 'Remuneration form created successfully!');
    }

    public function edit(RemunerationForm $remunerationForm)
    {
        abort_if(
            Gate::denies('remuneration_form_edit') || !in_array($remunerationForm->status_id, [1, 4, 7, 12, 15]),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $statuses = Status::whereIn('id', [1, 7, 9])->pluck('name', 'id');

        $remunerationForm->load('status');

        return view('admin.remunerationForms.edit', compact('statuses', 'remunerationForm'));
    }

    public function update(UpdateRemunerationFormRequest $request, RemunerationForm $remunerationForm)
    {
        $remunerationForm->update($request->only('subject', 'total', 'deductions', 'status_id'));

        return redirect()->route('admin.remuneration-forms.index');
    }

    public function show(RemunerationForm $remunerationForm)
    {
        abort_if(Gate::denies('remuneration_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remunerationForm->load('status', 'chairman', 'dean', 'exam_controller', 'created_by', 'logs.user', 'comments');
        $defaultStatus = Status::find(1);
        $user          = auth()->user();
        $logs          = AuditLogService::generateLogs($remunerationForm);

        return view('admin.remunerationForms.show', compact('remunerationForm', 'defaultStatus', 'user', 'logs'));
    }

    public function destroy(RemunerationForm $remunerationForm)
    {
        abort_if(Gate::denies('remuneration_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remunerationForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyRemunerationFormRequest $request)
    {
        RemunerationForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function showSend(RemunerationForm $remunerationForm)
{
    abort_if(!auth()->user()->is_user, Response::HTTP_FORBIDDEN, '403 Forbidden');

    $user = auth()->user();
    $departmentId = $user->department_id; // Assuming 'department_id' is a field on the User model
    $facultyId = $user->faculty_id; // Assuming 'faculty_id' is a field on the User model

    if ($remunerationForm->status_id == 1) {
        $role = 'Chairman';
        $roleId = 5;
    } elseif (in_array($remunerationForm->status_id, [11])) {
        $role = 'Dean';
        $roleId = 3;
    } elseif (in_array($remunerationForm->status_id, [3])) {
        $role = 'Exam Controller';
        $roleId = 4;
    }
    elseif (in_array($remunerationForm->status_id, [6])) {
        $role = 'Finance';
        $roleId = 6;
    }
    else {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    $role = Role::find($roleId);
    if (!$role) {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    $roleTitle = $role->title; // Get the title property from the Role model

    $query = $role->users();
    if ($roleId == 5) {
        $query->where('department_id', $departmentId); // Filter users by the same department
    } elseif ($roleId == 3) {
        $query->where('faculty_id', $facultyId); // Filter users by the same faculty
    }
    $users = $query->pluck('name', 'id');

    return view('admin.remunerationForms.send', compact('remunerationForm', 'roleTitle', 'users'));
}



public function send(Request $request, RemunerationForm $remunerationForm)
{
    abort_if(!auth()->user()->is_user, Response::HTTP_FORBIDDEN, '403 Forbidden');

    $user = auth()->user();
    $departmentId = $user->department_id; // Assuming 'department_id' is a field on the User model
    $facultyId = $user->faculty_id; // Assuming 'faculty_id' is a field on the User model

    if ($remunerationForm->status_id == 1) {
        $column = 'chairman_id';
        $roleId = 5;
        $status = 10;
    } elseif (in_array($remunerationForm->status_id, [11])) {
        $column = 'dean_id';
        $roleId = 3;
        $status = 2;
    } elseif (in_array($remunerationForm->status_id, [3])) {
        $column = 'exam_controller_id';
        $roleId = 4;
        $status = 5;
    } elseif (in_array($remunerationForm->status_id, [6])) {
        $column = 'finance_id';
        $roleId = 6;
        $status = 13;
    } else {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    $role = Role::find($roleId);
    if (!$role) {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    $query = $role->users();
    if ($roleId == 5) {
        $query->where('department_id', $departmentId); // Filter users by the same department
    } elseif ($roleId == 3) {
        $query->where('faculty_id', $facultyId); // Filter users by the same faculty
    }
    $users = $query->pluck('id');

    $request->validate([
        'user_id' => 'required|in:' . $users->implode(',')
    ]);

    $remunerationForm->update([
        $column => $request->user_id,
        'status_id' => $status
    ]);

    return redirect()->route('admin.remuneration-forms.index')->with('message', 'Remuneration form has been sent.');
}


    public function showAnalyze(RemunerationForm $remunerationForm)
    {
        $user = auth()->user();

        abort_if(
            (!$user->is_chairman || $remunerationForm->status_id != 10) && (!$user->is_dean || $remunerationForm->status_id != 2) && (!$user->is_exam_controller || $remunerationForm->status_id != 5 || $remunerationForm->status_id != 13),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return view('admin.remunerationForms.analyze', compact('remunerationForm'));
    }

    public function analyze(Request $request, RemunerationForm $remunerationForm)
    {
        $user = auth()->user();
        if ($user->is_chairman && $remunerationForm->status_id == 10) {
            $status = $request->has('approve') ? 11 : 12;
        } else if ($user->is_dean && $remunerationForm->status_id == 2) {
            $status = $request->has('approve') ? 3 : 4;
        } else if ($user->is_exam_controller && $remunerationForm->status_id == 5) {
            $status = $request->has('approve') ? 6 : 7;
        }
        else if ($user->is_finance && $remunerationForm->status_id == 13) {
            $status = $request->has('approve') ? 14 : 15;
        } else {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $request->validate([
            'comment_text' => 'required'
        ]);

        $remunerationForm->comments()->create([
            'comment_text' => $request->comment_text,
            'user_id' => $user->id
        ]);

        $remunerationForm->update([
            'status_id' => $status
        ]);

        return redirect()->route('admin.remuneration-forms.index')->with('message', 'Remuneration Form status updated.');
    }
}
