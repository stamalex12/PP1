
        <h2>Volunteering Programs</h2>

        <table class="table table-striped">
            <thead>
            <tr>

                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($volunteerNeeds as $volunteerNeed)
                <tr>
                    <td>{!!link_to_action('PageController@volunteerView', $volunteerNeed->name, $volunteerNeed->id) !!}</td>

                    <td>{{$volunteerNeed->startDate->format('dS F Y')}}</td>
                    <td>{{$volunteerNeed->endDate->format('dS F Y')}}</td>
                    <td>
                        {!!link_to_action('PageController@volunteerView', 'View Details/Apply', $volunteerNeed->id) !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>



