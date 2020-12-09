@extends('layouts.layout')

@section('title'){{ ucfirst($user['username']) }} @stop

@section('main')
    {{--    TODO create js for id="app"--}}
    <div id="app">
        @include('pages.profile.include.header')
        <div class="page-profile">
            <div class="profile__left">
                @include('pages.profile.include.tabs')
                <div class="main-block">
                    <div class="main-header">
                        <h4 class="title"><i class="mdi mdi-school-outline"></i> Təhsil</h4>
                    </div>
                    <div class="block">
                        <div class="block_side">
                            <ul>
                                <li>
                                    <span class="block_title">AzerCosmos</span>
                                    <span class="block_date">Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})</span>
                                    <span class="block_text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                                        neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                                        tenetur unde veniam veritatis voluptate!
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="block_side">
                            <ul>
                                <li>
                                    <span class="block_title">AzerCosmos</span>
                                    <span class="block_date">Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})</span>
                                    <span class="block_text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                                        neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                                        tenetur unde veniam veritatis voluptate!
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="main-block">
                    <div class="main-header">
                        <h4 class="title"><i class="mdi mdi-account-tie"></i> İş təcrübəsi</h4>
                        <a href="#">düzəltmək</a>
                    </div>
                    <div class="block">
                        <div class="block_side">
                            <ul>
                                <li>
                                    <span class="block_title">AzerCosmos</span>
                                    <span class="block_date">Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})</span>
                                    <span class="block_text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                                        neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                                        tenetur unde veniam veritatis voluptate!
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="block_side">
                            <ul>
                                <li>
                                    <span class="block_title">AzerCosmos</span>
                                    <span class="block_date">Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})</span>
                                    <span class="block_text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                                        neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                                        tenetur unde veniam veritatis voluptate!
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="main-block">
                    <div class="main-header">
                        <h4 class="title"><i class="mdi mdi-arm-flex-outline"></i> Skills</h4>
                        <a href="#">düzəltmək</a>
                    </div>
                    <div class="block">
                        <div class="block_side">
                            <ul>
                                <li>
                                    <span class="block_title">AzerCosmos</span>
                                    <span class="block_date">Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})</span>
                                    <span class="block_text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                                        neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                                        tenetur unde veniam veritatis voluptate!
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="block_side">
                            <ul>
                                <li>
                                    <span class="block_title">AzerCosmos</span>
                                    <span class="block_date">Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})</span>
                                    <span class="block_text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                                        neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                                        tenetur unde veniam veritatis voluptate!
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content_right">
                @include('pages.profile.include.right')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        const stickyblock = stickybits('#default-block', {
            stickyBitStickyOffset: 10,
        });
    </script>
@endsection
