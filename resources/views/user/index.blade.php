@extends('layouts.user')
@section('content')
    {{--    <a href="{{ 'admin' }}">Admin panelga kirish</a>--}}
    @include('user.components.navbar')
    <section id="posts">
        <div class="container">
            <div class="row post-card-box">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                    <a href="#" class="card shadow-sm">
                        <div class="card-header text-center">
                            <div class="card-header-image" style="background-image:url('img/post.png');"></div>
                            <div class="card-date">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-date-day">06</div>
                                    <div class="card-date-month">march</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</div>
                            <span>
                            <i class="far fa-long-arrow-right"></i>
                        </span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                    <a href="#" class="card shadow-sm">
                        <div class="card-header text-center">
                            <div class="card-header-image" style="background-image:url('img/post.png');"></div>
                            <div class="card-date">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-date-day">06</div>
                                    <div class="card-date-month">march</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</div>
                            <span>
                            <i class="far fa-long-arrow-right"></i>
                        </span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                    <a href="#" class="card shadow-sm">
                        <div class="card-header text-center">
                            <div class="card-header-image" style="background-image:url('img/post.png');"></div>
                            <div class="card-date">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-date-day">06</div>
                                    <div class="card-date-month">march</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</div>
                            <span>
                            <i class="far fa-long-arrow-right"></i>
                        </span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                    <a href="#" class="card shadow-sm">
                        <div class="card-header text-center">
                            <div class="card-header-image" style="background-image:url('img/post.png');"></div>
                            <div class="card-date">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-date-day">06</div>
                                    <div class="card-date-month">march</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</div>
                            <span>
                            <i class="far fa-long-arrow-right"></i>
                        </span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                    <a href="#" class="card shadow-sm">
                        <div class="card-header text-center">
                            <div class="card-header-image" style="background-image:url('img/post.png');"></div>
                            <div class="card-date">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-date-day">06</div>
                                    <div class="card-date-month">march</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</div>
                            <span>
                            <i class="far fa-long-arrow-right"></i>
                        </span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                    <a href="#" class="card shadow-sm">
                        <div class="card-header text-center">
                            <div class="card-header-image" style="background-image:url('img/post.png');"></div>
                            <div class="card-date">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-date-day">06</div>
                                    <div class="card-date-month">march</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</div>
                            <span>
                            <i class="far fa-long-arrow-right"></i>
                        </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center text-sm-center text-md-right text-lg-right mt-1">
                <a href="#" class="btn btn-link text-dark font-weight-bold text-decoration-none">Все новости</a>
            </div>
        </div>
    </section>
    <section id="team">
        <div class="container">
            <h1 class="text-center">
                Meet <span class="text-green">Our Team</span>
            </h1>
            <div class="row team-card-box justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="statistics">
        <div class="container">
            <h1 class="text-center mb-5">
                Statistics
            </h1>
            <div class="row stat-card-box">
                <div class="col-md-3 col-sm-6 col-12 stat-card-item mb-5 mb-sm-2 mb-5">
                    <div class="stat-card">
                        <div class="stat-card-img text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="43.253" height="43.254"
                                 viewBox="0 0 43.253 43.254">
                                <path
                                    d="M39.279,9.157c-.329-.465-.673-.918-1.038-1.355A21.586,21.586,0,0,0,21.627,0h-.052L21.5,0A21.594,21.594,0,0,0,5.012,7.8q-.546.656-1.038,1.355a21.551,21.551,0,0,0,0,24.94c.329.465.674.918,1.038,1.355a21.591,21.591,0,0,0,16.488,7.8l.075,0h.051a21.587,21.587,0,0,0,16.615-7.8c.364-.437.709-.891,1.038-1.356a21.551,21.551,0,0,0,0-24.94ZM15.3,2.813A20.231,20.231,0,0,0,10.527,10.9,20.627,20.627,0,0,1,6.445,8.866,19.906,19.906,0,0,1,15.3,2.813Zm-9.9,7.41a22.778,22.778,0,0,0,4.618,2.33,34.469,34.469,0,0,0-1.184,8.892H1.778A19.738,19.738,0,0,1,5.4,10.223Zm-3.559,13H8.873A34.09,34.09,0,0,0,10.02,30.7,22.649,22.649,0,0,0,5.4,33.033,19.718,19.718,0,0,1,1.845,23.219ZM6.451,34.384a20.75,20.75,0,0,1,4.074-2.027A20.213,20.213,0,0,0,15.3,40.44,19.9,19.9,0,0,1,6.451,34.384ZM20.74,41.415c-3.641-.5-6.784-4.233-8.566-9.612a32.8,32.8,0,0,1,8.566-1.312Zm0-12.7a33.8,33.8,0,0,0-9.064,1.421A32.9,32.9,0,0,1,10.65,23.22H20.74Zm0-7.274H10.613a33.5,33.5,0,0,1,1.071-8.326,33.8,33.8,0,0,0,9.055,1.418v6.908Zm0-8.681a32.753,32.753,0,0,1-8.561-1.311C13.96,6.076,17.1,2.338,20.74,1.838Zm20.733,8.681H34.311a34.452,34.452,0,0,0-1.173-8.856,22.764,22.764,0,0,0,4.712-2.365A19.74,19.74,0,0,1,41.473,21.444ZM36.806,8.868a20.713,20.713,0,0,1-4.173,2.063,20.177,20.177,0,0,0-4.844-8.171A19.906,19.906,0,0,1,36.806,8.868ZM22.514,1.852c3.6.556,6.7,4.287,8.466,9.627a32.807,32.807,0,0,1-8.466,1.284Zm0,12.685a33.855,33.855,0,0,0,8.958-1.389,33.418,33.418,0,0,1,1.064,8.3H22.514Zm0,8.682H32.5a33.037,33.037,0,0,1-1.019,6.891,33.859,33.859,0,0,0-8.965-1.391l0-5.5Zm0,18.183V30.492a32.861,32.861,0,0,1,8.471,1.284C29.22,37.117,26.115,40.846,22.514,41.4Zm5.275-.907a20.161,20.161,0,0,0,4.847-8.169A20.736,20.736,0,0,1,36.8,34.385,19.913,19.913,0,0,1,27.789,40.5Zm10.06-7.462a22.707,22.707,0,0,0-4.712-2.366,34.079,34.079,0,0,0,1.136-7.448h7.135A19.688,19.688,0,0,1,37.849,33.033Z"
                                    fill="#363636"/>
                            </svg>
                        </div>
                        <div class="stat-card-number">
                            5478
                        </div>
                        <div class="stat-card-text">
                            memoranda of understanding
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 stat-card-item mb-5 mb-sm-2 mb-5">
                    <div class="stat-card">
                        <div class="stat-card-img text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="71.588" height="45.454"
                                 viewBox="0 0 71.588 45.454">
                                <g transform="translate(0 -92.25)">
                                    <g transform="translate(0 92.25)">
                                        <path
                                            d="M61.914,112.251a8.173,8.173,0,1,0-9.377,0,14.161,14.161,0,0,0-4.83,2.833,18.324,18.324,0,0,0-6.629-3.612,10.354,10.354,0,1,0-10.708,0,18.477,18.477,0,0,0-6.558,3.569,14.276,14.276,0,0,0-4.773-2.776,8.173,8.173,0,1,0-9.377,0A14.346,14.346,0,0,0,0,125.82v.935a.061.061,0,0,0,.057.057H17.38a19.051,19.051,0,0,0-.156,2.394v.963A7.532,7.532,0,0,0,24.76,137.7H46.715a7.532,7.532,0,0,0,7.536-7.536v-.963a19.05,19.05,0,0,0-.156-2.394H71.532a.061.061,0,0,0,.057-.057v-.935A14.4,14.4,0,0,0,61.914,112.251Zm-10.6-6.7a5.907,5.907,0,1,1,6.02,5.907h-.227A5.9,5.9,0,0,1,51.319,105.551ZM27.607,102.6a8.088,8.088,0,1,1,8.555,8.074h-.935A8.1,8.1,0,0,1,27.607,102.6ZM8.4,105.551a5.907,5.907,0,1,1,6.02,5.907h-.227A5.908,5.908,0,0,1,8.4,105.551Zm9.377,18.981H2.295a12.1,12.1,0,0,1,11.927-10.808h.17a11.977,11.977,0,0,1,7.72,2.875A18.6,18.6,0,0,0,17.777,124.531Zm34.179,5.638a5.277,5.277,0,0,1-5.269,5.269H24.731a5.277,5.277,0,0,1-5.269-5.269v-.963a16.271,16.271,0,0,1,15.765-16.247c.156.014.326.014.482.014s.326,0,.482-.014a16.271,16.271,0,0,1,15.765,16.247Zm1.686-5.638a18.549,18.549,0,0,0-4.292-7.876,12.035,12.035,0,0,1,7.791-2.932h.17a12.1,12.1,0,0,1,11.927,10.808Z"
                                            transform="translate(0 -92.25)" fill="#363636"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="stat-card-number">
                            1453
                        </div>
                        <div class="stat-card-text">
                            faculty members
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 stat-card-item mb-5 mb-sm-2 mb-5">
                    <div class="stat-card">
                        <div class="stat-card-img text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52">
                                <path
                                    d="M199.32,110.927l-2.231-3.932-2.231,3.931-4.428.907,3.05,3.337-.506,4.492,4.116-1.869,4.116,1.869-.506-4.492,3.05-3.337Zm.07,6.238-2.3-1.045-2.3,1.045.283-2.512-1.705-1.866,2.476-.507,1.247-2.2,1.247,2.2,2.476.507-1.705,1.866Z"
                                    transform="translate(-171.09 -96.128)" fill="#363636"/>
                                <path
                                    d="M40.472,6.094V4.57H42V0H17.621V1.523H40.472V3.047H11.527V1.523H16.1V0H10V4.57h1.523V6.094H0V18.771A5.916,5.916,0,0,0,1.954,23.2a8.758,8.758,0,0,0,4.441,2.089l8.488,1.475A14.637,14.637,0,0,0,20.8,31.018a3.045,3.045,0,0,0,1.371,5.1A7.29,7.29,0,0,1,18.931,42.1H14.1l-1.814,3.629V52h19.8V50.476H13.812V46.085l1.232-2.465h21.91l1.232,2.465v4.391h-4.57V52h6.094V45.726L37.9,42.1H33.069a7.29,7.29,0,0,1-3.239-5.981,3.045,3.045,0,0,0,1.371-5.1,14.637,14.637,0,0,0,5.916-4.258L45.6,25.285A8.758,8.758,0,0,0,50.046,23.2,5.917,5.917,0,0,0,52,18.771V6.094Zm0,4.57h6.957v8.107c0,1.514-2.34,1.965-2.607,2.011l-4.958.862a14.365,14.365,0,0,0,.609-4.125ZM12.136,21.644l-4.958-.862c-.267-.046-2.607-.5-2.607-2.011V10.664h6.957v6.855a14.365,14.365,0,0,0,.609,4.125ZM1.523,18.771V7.617h10V9.141H3.047v9.631c0,2.094,2,3.187,3.87,3.512L12.743,23.3a14.52,14.52,0,0,0,.881,1.7L6.656,23.784c-2.368-.412-5.132-1.971-5.132-5.013ZM21.319,42.1a9.293,9.293,0,0,0,2.371-5.879h4.619A9.293,9.293,0,0,0,30.681,42.1Zm7.728-7.4H22.953a1.523,1.523,0,0,1,0-3.047h6.094a1.523,1.523,0,0,1,0,3.047Zm-.09-4.57H23.043a13.059,13.059,0,0,1-9.992-12.605V4.57h25.9V17.519A13.059,13.059,0,0,1,28.956,30.124Zm21.52-11.353c0,3.042-2.765,4.6-5.132,5.013L38.376,25a14.521,14.521,0,0,0,.881-1.7l5.826-1.012c1.871-.325,3.87-1.418,3.87-3.512V9.141h-8.48V7.617h10Z"
                                    fill="#363636"/>
                                <path d="M353.5,90h1.523v1.523H353.5Z" transform="translate(-317.598 -80.859)"
                                      fill="#363636"/>
                                <path d="M353.5,60h1.523v1.523H353.5Z" transform="translate(-317.598 -53.906)"
                                      fill="#363636"/>
                                <path d="M338.5,444.5h1.523v1.523H338.5Z" transform="translate(-304.123 -399.352)"
                                      fill="#363636"/>
                                <path d="M218.5,455.748h7.617v1.523H218.5Z" transform="translate(-196.309 -409.462)"
                                      fill="#363636"/>
                            </svg>

                        </div>
                        <div class="stat-card-number">
                            25
                        </div>
                        <div class="stat-card-text">
                            coursera certificates
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 stat-card-item mb-5 mb-sm-2 mb-5">
                    <div class="stat-card">
                        <div class="stat-card-img text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="49.637" height="49.637"
                                 viewBox="0 0 49.637 49.637">
                                <g transform="translate(-2.583 -2.584)">
                                    <g transform="translate(2.583 2.584)">
                                        <path
                                            d="M47.5,41.613l-10.583-3.43a2.4,2.4,0,0,0-.783-.127h-.149l-2.234-2.978a.827.827,0,0,0-.558-.324.719.719,0,0,0-.1.008v-.015h-.827V32.1a8.545,8.545,0,0,0,3.309-6.747v-6.8a.817.817,0,0,0,.407-.106.827.827,0,0,0,.42-.72V11.18L40.537,9.5v1.253a1.655,1.655,0,0,0-1.655,1.655v4.964a1.655,1.655,0,0,0,1.655,1.655h1.655a1.654,1.654,0,0,0,1.655-1.655V12.41a1.655,1.655,0,0,0-1.655-1.655V8.273a.827.827,0,0,0-.486-.754L25.159.073a.827.827,0,0,0-.678,0L7.935,7.519A.827.827,0,0,0,7.963,9.04l5.273,2.139v6.55a.827.827,0,0,0,.827.827v6.8A8.545,8.545,0,0,0,17.373,32.1v2.642h-.827v.015a.719.719,0,0,0-.1-.008.827.827,0,0,0-.558.324L13.65,38.055H13.5a2.368,2.368,0,0,0-.768.122L2.086,41.629A3.282,3.282,0,0,0,0,44.7V48.81a.827.827,0,0,0,.827.827H48.809a.827.827,0,0,0,.827-.827V44.7A3.3,3.3,0,0,0,47.5,41.613Zm-5.31-29.2v4.964H40.537V12.41ZM32.944,36.752l1.51,2.018L28.16,44.364l-2.1-2.1Zm-8.126,4.38L19.027,36.5V33.116a8.494,8.494,0,0,0,3.6.8h4.385a8.494,8.494,0,0,0,3.6-.8V36.5ZM13.941,7.456a.827.827,0,0,0-.7.817V9.394l-2.86-1.158,14.442-6.5,14.442,6.5L36.4,9.394V8.273a.827.827,0,0,0-.7-.817L24.944,5.8a.8.8,0,0,0-.248,0Zm.933,3.3a.792.792,0,0,0,.017-.132V8.983l9.927-1.527,9.927,1.527v1.64a.792.792,0,0,0,.017.132h-.017v5.65a10.237,10.237,0,0,0-3.723-.687,9.419,9.419,0,0,0-5.747,1.831,5.841,5.841,0,0,0-.457.392c-.142-.134-.293-.264-.456-.39a9.416,9.416,0,0,0-5.749-1.832,10.237,10.237,0,0,0-3.723.687v-5.65Zm.844,14.6V17.877a8.593,8.593,0,0,1,2.9-.5,7.737,7.737,0,0,1,4.726,1.478,4.329,4.329,0,0,1,.815.819.827.827,0,0,0,1.324,0,4.343,4.343,0,0,1,.817-.821,7.738,7.738,0,0,1,4.728-1.477,8.593,8.593,0,0,1,2.9.5v7.479a6.916,6.916,0,0,1-6.908,6.908H22.626A6.916,6.916,0,0,1,15.718,25.357Zm.977,11.4,6.882,5.508-2.1,2.1L15.183,38.77Zm31.287,11.23H1.654V44.7a1.624,1.624,0,0,1,.993-1.514L13.26,39.746a.735.735,0,0,1,.241-.036h.248l7.211,6.409a.827.827,0,0,0,1.134-.033l2.724-2.724,2.724,2.724a.827.827,0,0,0,1.134.033l7.211-6.409h.248a.762.762,0,0,1,.257.042l10.55,3.416a1.635,1.635,0,0,1,1.04,1.53Z"
                                            transform="translate(0 -0.001)" fill="#363636"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="stat-card-number">
                            10235
                        </div>
                        <div class="stat-card-text">
                            bachelor programmes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="partners">
        <div class="container">
            <ul id="partners-slider" class="owl-carousel">
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/gov.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/edu.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/uzedu.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/lex.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/data.gov.uz.png" alt=""/>
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
