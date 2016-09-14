@extends('layouts.master')

@section('content')
   <div class="text-inter">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1>Content</h1>
               {!!link_to_action('ContentController@create', 'Create') !!}
               <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                     <th>Title</th>
                     <th>Content</th>
                     <th>SortOrder</th>
                     <th>Action</th>

                  </tr>
                  </thead>
                  <tfoot>
                  <tr>
                     <th>Title</th>
                     <th>Content</th>
                     <th>SortOrder</th>
                     <th>Action</th>
                  </tr>
                  </tfoot>
                  <tbody>
                  @foreach($content as $contents)

                     <tr>
                        <th>{{$contents->title}}</th>
                        <th>{{$contents->content}}</th>
                        <th>{{$contents->sortOrder}}</th>
                        <th>{!!link_to_action('ContentController@edit', 'Edit', $contents->id) !!}</th>
                     </tr>
                  @endforeach



                  </tbody>
               </table>
               <div class="divider"></div>
            </div>
         </div>
      </div>
   </div>
    @endsection

