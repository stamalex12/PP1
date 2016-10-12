@extends('layouts.master')
@section('title', 'Admin Control Panel')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Control Panel</h1>
            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div> @endif
            <div class="list-group">
                <div class="col-md-6 col-xs-12">
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-person"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-social-info"></i></div>
                            <h4 class="list-group-item-heading">Manage Users</h4>
                            <a href="users" class="btn btn-default btn-raised">All Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="list-group-separator"></div>
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-group"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Manage Roles</h4>
                            <a href="roles" class="btn btn-default btn-raised">All Roles</a>
                            <a href="roles/create" class="btn btn-primary btn-raised">Create A Role</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="list-group-separator"></div>

                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-editor-border-color"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Website Information</h4>
                            <a href="websiteinfo" class="btn btn-default btn-raised">Update Website Information</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="list-group-separator"></div>

                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-group"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Website Settings</h4>
                            <a href="settings" class="btn btn-default btn-raised">Edit Website Settings</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="list-group-separator"></div>

                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-editor-border-color"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Manage Content</h4>
                            <a href="content" class="btn btn-default btn-raised">All Content</a>
                            <a href="content/create" class="btn btn-primary btn-raised">Create Content</a>
                        </div>
                    </div>
                </div>
                @if(\App\System::all()->first()->projects == 1)
                    @if(\App\System::all()->first()->resourceneeds == 1 )
                        <div class="col-md-6 col-xs-12">
                            <div class="list-group-separator"></div>

                            <div class="list-group-item">
                                <div class="row-action-primary">
                                    <i class="mdi-social-group"></i>
                                </div>
                                <div class="row-content">
                                    <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                    <h4 class="list-group-item-heading">Manage Resource Needs</h4>
                                    <a href="resources" class="btn btn-default btn-raised">All Resource Needs</a>
                                    <a href="resources/create" class="btn btn-primary btn-raised">Create A Resource
                                        Need</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6 col-xs-12">
                        <div class="list-group-separator"></div>
                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-social-group"></i>
                            </div>
                            <div class="row-content">
                                <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                <h4 class="list-group-item-heading">Manage Expenses</h4>
                                <a href="expenses" class="btn btn-default btn-raised">All Expenses</a>
                                <a href="expenses/create" class="btn btn-primary btn-raised">Create an Expense</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="list-group-separator"></div>
                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-social-group"></i>
                            </div>
                            <div class="row-content">
                                <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                <h4 class="list-group-item-heading">Manage Donations</h4>
                                <a href="donations" class="btn btn-default btn-raised">All Donations</a>
                                <a href="donations/create" class="btn btn-primary btn-raised">Record a Donation</a>
                            </div>
                        </div>
                    </div>

                    @if(\App\System::all()->first()->volunteerprograms == 1 )
                        <div class="col-md-6 col-xs-12">
                            <div class="list-group-separator"></div>

                            <div class="list-group-item">
                                <div class="row-action-primary">
                                    <i class="mdi-social-group"></i>
                                </div>
                                <div class="row-content">
                                    <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                    <h4 class="list-group-item-heading">Manage Volunteer Needs</h4>
                                    <a href="volunteering" class="btn btn-default btn-raised">All Volunteer Needs</a>
                                    <a href="volunteering/create" class="btn btn-primary btn-raised">Create A Volunteer
                                        Need</a>
                                </div>
                            </div>

                            <div class="list-group-item">
                                <div class="row-action-primary">
                                    <i class="mdi-social-group"></i>
                                </div>
                                <div class="row-content">
                                    <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                    <h4 class="list-group-item-heading">Manage Volunteer Applications</h4>
                                    <a href="applications" class="btn btn-default btn-raised">All Applications</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                @if(\App\System::all()->first()->testimonies == 1 )
                    <div class="col-md-6 col-xs-12">
                        <div class="list-group-separator"></div>

                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-social-group"></i>
                            </div>
                            <div class="row-content">
                                <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                <h4 class="list-group-item-heading">Manage Testimonies</h4>
                                <a href="testimonies" class="btn btn-default btn-raised">All Testimonies</a>
                                <a href="testimonies/create" class="btn btn-primary btn-raised">Create A Testimony</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if(\App\System::all()->first()->email == 1 )
                    <div class="col-md-6 col-xs-12">
                        <div class="list-group-separator"></div>

                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-social-group"></i>
                            </div>
                            <div class="row-content">
                                <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                <h4 class="list-group-item-heading">Emails</h4>
                                <a href="testimonies" class="btn btn-default btn-raised">View Sent Emails</a>
                                <a href="email/create" class="btn btn-primary btn-raised">Send Email</a>
                                <a href="email-group/create" class="btn btn-primary btn-raised">Send Email To
                                    Subscribers</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if(\App\System::all()->first()->slider == 1 )
                    <div class="col-md-6 col-xs-12">
                        <div class="list-group-separator"></div>

                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-social-group"></i>
                            </div>
                            <div class="row-content">
                                <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                <h4 class="list-group-item-heading">Manage Slider</h4>
                                <a href="slider" class="btn btn-default btn-raised">View Slider Images</a>
                                <a href="slider/create" class="btn btn-primary btn-raised">Create Slider Image</a>

                            </div>
                        </div>
                    </div>
                @endif

                @if(\App\System::all()->first()->childdetails == 1 )
                    <div class="col-md-6 col-xs-12">
                        <div class="list-group-separator"></div>

                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-social-group"></i>
                            </div>
                            <div class="row-content">
                                <div class="action-secondary"><i class="mdi-material-info"></i></div>
                                <h4 class="list-group-item-heading">Manage Children</h4>
                                <a href="children" class="btn btn-default btn-raised">View Children</a>
                                <a href="children/create" class="btn btn-primary btn-raised">Create Child</a>

                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-6 col-xs-12">
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-group"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Manage Rooms</h4>
                            <a href="room" class="btn btn-default btn-raised">All Rooms</a>
                            <a href="room/create" class="btn btn-primary btn-raised">Create A Room</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-group"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Manage Room Bookings</h4>
                            <a href="roombooking" class="btn btn-default btn-raised">All Bookings</a>
                            <a href="roombooking/create" class="btn btn-primary btn-raised">Create A Booking</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-group"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Emails</h4>
                            <a href="testimonies" class="btn btn-default btn-raised">View Sent Emails</a>
                            <a href="email/create" class="btn btn-primary btn-raised">Send Email To Single Person</a>
                            <a href="email-group/create" class="btn btn-primary btn-raised">Send Email To Subscribed List</a>
                        </div>
                    </div>
                </div>

                <div class="list-group-separator"></div>
            </div>
        </div>
    </div>

@endsection
