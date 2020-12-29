<!DOCTYPE html>
<html lang="en">
@include('backend.layouts.head')
    <body>
        @include('backend.layouts.nav')
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        @include('backend.layouts.side')
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        @include('backend.layouts.dashboard')
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        @include('backend.layouts.footer')    
    </body>