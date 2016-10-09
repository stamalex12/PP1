<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\ResourceNeed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = expense::all();
        return view('backend.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resources = resourceNeed::all('name');
        return view('backend.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateExpenseRequest $request)
    {
        $expense = new Expense(array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'resourceNeed' => $request->get('resourceNeed')
        ));
        $expense->save();

        return redirect('admin/expenses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $resources = ResourceNeed::where('status', '=', 'Active')->get();

        return view('projects.index', compact('resources'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = expense::find($id);

        return view('backend/expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateExpenseRequest $request, $id)
    {
        $expense = expense::findOrFail($id);

        $expense->update(array(
            'name'          =>  $request->get('name'),
            'description'   =>  $request->get('description'),
            'amount'  =>  $request->get('amount'),
            'resourceNeed' => $request->get('resourceNeed')
        ));

        return redirect('admin/expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        expense::destroy($id);

        return redirect('admin/expenses');

    }

}
