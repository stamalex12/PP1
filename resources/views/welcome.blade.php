@extends('layouts.master')
@section('content')
            <div class="content">
                <div class="title">Laravel 5</div>
                <?php
                if(DB::connection()->getDatabaseName())
                {
                    echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
                }
        ?>
            </div>

@endsection
