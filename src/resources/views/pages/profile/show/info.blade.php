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
                        <h3><i class="mdi mdi-desk-lamp"></i> Education</h3>
                    </div>
                    <div class="main-item">
                        <div class="main-item__header">
                            <h4>Moscow State University</h4>
                            <div class="main-item__years">
                                Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})
                            </div>
                        </div>
                        <div class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                            neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                            tenetur unde veniam veritatis voluptate!
                        </div>
                    </div>
                </div>

                <div class="main-block">
                    <div class="main-header">
                        <h3><i class="mdi mdi-worker"></i> İş təcrübəsi</h3>
                        <a href="#">düzəltmək</a>
                    </div>
                    <div class="main-item">
                        <div class="main-item__header">
                            <h4>Azer Cosmos</h4>
                            <div class="main-item__years">
                                Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})
                            </div>
                        </div>
                        <div class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                            neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                            tenetur unde veniam veritatis voluptate!
                        </div>
                    </div>
                </div>

                <div class="main-block">
                    <div class="main-header">
                        <h3><i class="mdi mdi-arm-flex-outline"></i> Skills</h3>
                        <a href="#">düzəltmək</a>
                    </div>
                    <div class="main-item">
                        <div class="main-item__header">
                            <h4>Azer Cosmos</h4>
                            <div class="main-item__years">
                                Dec 1999 - Nov 2010 ({{ 2010-1999 . ' il' }})
                            </div>
                        </div>
                        <div class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque earum harum, iure libero
                            neque nostrum obcaecati perspiciatis praesentium quas qui, quisquam rem tempora temporibus
                            tenetur unde veniam veritatis voluptate!
                        </div>
                    </div>
                </div>
            </div>

            <div class="content_right">
                <div class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">Mükafatlar (2)</h3>
                    </div>

                    <div class="default-block__content">
                        <div class="trophy-list">
                            <div class="trophy-list__element">
                                <img src="{{ asset('images\trophies\nomination.svg') }}" alt="">
                                <div class="trophy-info">
                                    <div class="trophy-name">
                                        Məşhur
                                    </div>
                                    <div class="trophy-description">
                                        1000-dən çox baxış yığan
                                    </div>
                                </div>
                            </div>
                            <div class="trophy-list__element">
                                <img src="{{ asset('images\trophies\win.svg') }}" alt="" width="40">
                                <div class="trophy-info">
                                    <div class="trophy-name">
                                        Bir ill Klub
                                    </div>
                                    <div class="trophy-description">
                                        Bir ildir ki, DevHub-da.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="default-block" class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">Haqqında</h3>
                        <a href="#">ətraflı</a>
                    </div>

                    <div class="default-block__content">
                        <div class="user-info-blocks">
                            <div class="user-info-block">
                                <div>
                                    <i class="mdi mdi-worker"></i> Is yeri:
                                </div>
                                <div class="user-info-answer">
                                    DevHub
                                </div>
                            </div>
                            <div class="user-info-block">
                                <div>
                                    <i class="mdi mdi-map-marker-radius-outline"></i> Yaşadığı yer:
                                </div>
                                <div class="user-info-answer">
                                    Baku, Azerbaijan
                                </div>
                            </div>
                            <div class="user-info-block">
                                <div>
                                    <i class="mdi mdi-desk-lamp"></i> Təhsil:
                                </div>
                                <div class="user-info-answer">
                                    Baku, Azerbaijan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
