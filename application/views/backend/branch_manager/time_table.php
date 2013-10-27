  <!-- START Template Main Content -->
            <section id="main">
                <!-- START Bootstrap Navbar -->
                <div class="navbar navbar-static-top">
                    <div class="navbar-inner">
                        <!-- Breadcrumb -->
                        <ul class="breadcrumb">
                            <li><a href="#">Components</a> <span class="divider"></span></li>
                            <li class="active">Calendar</li>
                        </ul>
                        <!--/ Breadcrumb -->

                        <!-- Daterange Picker -->
                        <div id="reportrange" class="pull-right hidden-phone">
                            <span class="icon icon-calendar"></span>
                            <span id="rangedate">June 7, 2013 - June 13, 2013</span><span class="caret"></span>
                        </div>
                        <!--/ Daterange Picker -->
                    </div>
                </div>
                <!--/ END Bootstrap Navbar -->

                <!-- START Content -->
                <div class="container-fluid">
                    <!-- START Row -->
                    <div class="row-fluid">
                        <!-- START Page/Section header -->
                        <div class="span12">
                            <div class="page-header line1">
                                <h4>Calendar <small>organizing days for social, religious, commercial, or administrative purposes.</small></h4>
                            </div>
                        </div>
                        <!--/ END Page/Section header -->
                    </div>
                    <!--/ END Row -->

                    <!-- START Row -->
                    <div class="row-fluid">
                        <!-- START Default Calendar -->
                        <div class="span12">
                            <div id="calendar" style="margin-bottom:20px;"></div>
                        </div>
                        <!--/ END Default Calendar -->
                    </div>
                    <!--/ END Row -->

                    <!-- START Row -->
                    <div class="row-fluid">
                        <!-- START External Dragging -->
                        <div class="span4 widget shadowed dark" id="external-events">
                            <header><h4 class="title">Draggable Events</h4></header>
                            <section class="body">
                                <div class="body-inner">
                                    <div class="external-event">My Event 1</div>
                                    <div class="external-event">My Event 2</div>
                                    <div class="external-event">My Event 3</div>
                                    <div class="external-event">My Event 4</div>
                                    <div class="external-event">My Event 5</div>
                                    <hr/>
                                    <input type='checkbox' id='drop-remove' /> <label for='drop-remove'>remove after drop</label>
                                </div>
                            </section>
                        </div>
                        <div class="span8 widget shadowed dark">
                            <header><h4 class="title">Calendar</h4></header>
                            <section class="body">
                                <div class="body-inner">
                                    <div id='calendar_events'></div>
                                </div>
                            </section>
                        </div>
                        <!--/ END External Dragging -->
                    </div>
                    <!--/ END Row -->
                </div>
                <!--/ END Content -->

            </section>
            <!--/ END Template Main Content -->
