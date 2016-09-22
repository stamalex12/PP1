@extends('layouts.master')
@section('title', 'Admin Control Panel')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Control Panel</h1>
            <div class="list-group">
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-social-person"></i>
                    </div>
                    <div class="row-content">
                        <div class="action-secondary"><i class="mdi-social-info"></i></div>
                        <h4 class="list-group-item-heading">Manage User</h4>
                        <a href="users" class="btn btn-default btn-raised">All Users</a>
                    </div>
                </div>

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
                <div class="list-group-separator"></div>

                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-social-group"></i>
                    </div>
                    <div class="row-content">
                        <div class="action-secondary"><i class="mdi-material-info"></i></div>
                        <h4 class="list-group-item-heading">Manage Resource Needs</h4>
                        <a href="resources" class="btn btn-default btn-raised">All Resource Needs</a>
                        <a href="resources/create" class="btn btn-primary btn-raised">Create A Resource Need</a>
                    </div>
                </div>
                <div class="list-group-separator"></div>

                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-social-group"></i>
                    </div>
                    <div class="row-content">
                        <div class="action-secondary"><i class="mdi-material-info"></i></div>
                        <h4 class="list-group-item-heading">Manage Volunteer Needs</h4>
                        <a href="volunteering" class="btn btn-default btn-raised">All Volunteer Needs</a>
                        <a href="volunteering/create" class="btn btn-primary btn-raised">Create A Volunteer Need</a>
                    </div>
                </div>
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

                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-social-group"></i>
                    </div>
                    <div class="row-content">
                        <div class="action-secondary"><i class="mdi-material-info"></i></div>
                        <h4 class="list-group-item-heading">Emails</h4>
                        <a href="testimonies" class="btn btn-default btn-raised">View Sent Emails</a>
                        <a href="email/create" class="btn btn-primary btn-raised">Send Email To Single Person</a>
                        <a href="email/create-group" class="btn btn-primary btn-raised">Send Email To Subscribed List</a>
                    </div>
                </div>
                <div class="list-group-separator"></div>
            </div>
        </div>
    </div>

@endsection
