<div class="meal-panel {{ $day }}" data-type="{{ $setting_id}}">
    <div class="row">
        <div class="col col-lg-1 col-day">
            <div class="mlabel">{{ $day_th }}</div>
            <div class="mdate {{ $day }}"><span id={{ $day }}></span></div>
        </div>
        @foreach ($mealSetting as $meal)
             @if ($meal[2] == 1)
                <div class="col col-meal" id="{{$meal[3]}}-{{$day}}">
                    <div class="mlabel">{{$meal[1]}}</div>
                    <div id="" class="ui-sortable ui-sortable-meal {{$meal[3]}}-{{$day}} {{$setting_id}}"
                        data-day="{{ $day }}" data-meal="{{$meal[3]}}" data-type="{{$setting_id}}">
                        @foreach ($food_logs as $food)
                            @if ($food->meal_code == $meal[0] && $food->meal_date == $date_in_week && $food->food_type == $setting_id)
                                <div class="ui-sortable ui-sortable-meal">
                                    <div class="menu-body food">
                                        <div class="col col-food-name" 
                                            data-energy="{{ $food->energy }}"
                                            data-protein="{{ $food->protein }}" 
                                            data-fat="{{ $food->fat }}" 
                                            data-carbohydrate="{{ $food->carbohydrate }}"
                                            data-vitamin_a="{{ $food->vitamin_a }}"
                                            data-vitamin_b1="{{ $food->vitamin_b1 }}"
                                            data-vitamin_b2="{{ $food->vitamin_b2 }}"
                                            data-vitamin_c="{{ $food->vitamin_c }}"
                                            data-iron="{{ $food->iron }}"
                                            data-calcium="{{ $food->calcium }}"
                                            data-phosphorus="{{ $food->phosphorus }}"
                                            data-fiber="{{ $food->fiber }}"
                                            data-sodium="{{ $food->sodium }}"
                                            data-sugar="{{ $food->sugar }}"
                                            id="{{ $food->food_id }}">
                                            {{ $food->food_thai }}
                                        </div>
                                        <div class="col col-delete">
                                            <a class="pull-right">
                                                <span><i class="fas fa-times"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="placeholder">
                            <div class="text-center menu-body ui-sortable-handle ui-sortable-placeholder ui-state-disabled">
                                <span class=""><i class="fa fa-hand-pointer-o"></i>???????????????????????????</span>
                            </div>
                        </div>
                    </div>
                </div>
             @endif
        @endforeach
    </div> 
<!-- 
        @if ($userSetting->is_breakfast == 1)

            <div class="col col-meal" id="breakfast-meal-{{ $day }}" data-date="123">
                <div class="mlabel">????????????</div>
                <div id="" class="ui-sortable ui-sortable-meal breakfast-meal-{{ $day }} {{ $setting_id }}"
                    data-day="{{ $day }}" data-meal="breakfast-snack" data-type="{{ $setting_id }}">
                    @foreach ($food_logs as $food)
                        @if ($food->meal_code == 1 && $food->meal_date == $date_in_week && $food->food_type == $setting_id)
                            <div class="ui-sortable ui-sortable-meal">
                                <div class="menu-body">
                                    <div class="col col-food-name" data-energy="{{ $food->energy }}"
                                        data-protein="{{ $food->protein }}" data-fat="{{ $food->fat }}"
                                        id="{{ $food->food_id }}">
                                        {{ $food->food_thai }}
                                    </div>
                                    <div class="col col-delete">
                                        <a class="pull-right">
                                            <span><i class="fas fa-times"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="placeholder">
                        <div class="text-center menu-body ui-sortable-handle ui-sortable-placeholder ui-state-disabled">
                            <span class=""><i class="fa fa-hand-pointer-o"></i>???????????????????????????</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($userSetting->is_morning_snack == 1)
            <div class="col col-meal" id="breakfast-snack-meal-{{ $day }}" data-date="123">
                <div class="mlabel">????????????????????????</div>
                <div id="" class="ui-sortable ui-sortable-meal breakfast-snack-{{ $day }} {{ $setting_id }}"
                    data-day="{{ $day }}" data-meal="breakfast-snack" data-type="{{ $setting_id }}">
                    @foreach ($food_logs as $food)
                        @if ($food->meal_code == 2 && $food->meal_date == $date_in_week && $food->food_type == $setting_id)
                            <div class="">
                                <div class="menu-body">
                                    <div class="col col-food-name" data-energy="{{ $food->energy }}"
                                        data-protein="{{ $food->protein }}" data-fat="{{ $food->fat }}"
                                        id="{{ $food->food_id }}">
                                        {{ $food->food_thai }}
                                    </div>
                                    <div class="col col-delete">
                                        <a class="pull-right">
                                            <span><i class="fas fa-times"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="placeholder">
                        <div class="text-center menu-body ui-sortable-handle ui-sortable-placeholder ui-state-disabled">
                            <span class=""><i class="fa fa-hand-pointer-o"></i>???????????????????????????</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($userSetting->is_lunch == 1)
            <div class="col col-meal" id="lunch-meal-{{ $day }}">
                <div class="mlabel">?????????????????????</div>
                <div id="" class="ui-sortable ui-sortable-meal lunch-{{ $day }} {{ $setting_id }}" data-day="{{ $day }}"
                    data-meal="lunch" data-type="{{ $setting_id }}">
                    @foreach ($food_logs as $food)
                        @if ($food->meal_code == 3 && $food->meal_date == $date_in_week && $food->food_type == $setting_id)
                            <div class="ui-sortable ui-sortable-meal">
                                <div class="menu-body">
                                    <div class="col col-food-name" data-energy="{{ $food->energy }}"
                                        data-protein="{{ $food->protein }}" data-fat="{{ $food->fat }}"
                                        id="{{ $food->food_id }}">
                                        {{ $food->food_thai }}
                                    </div>
                                    <div class="col col-delete">
                                        <a class="pull-right">
                                            <span><i class="fas fa-times"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="placeholder">
                        <div class="text-center menu-body ui-sortable-handle ui-sortable-placeholder ui-state-disabled">
                            <span class=""><i class="fa fa-hand-pointer-o"></i>???????????????????????????</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($userSetting->is_afternoon_snack)
            <div class="col col-meal" id="lunch-snack-meal-{{ $day }}">
                <div class="mlabel">????????????????????????</div>
                <div id="" class="ui-sortable ui-sortable-meal lunch-snack-{{ $day }} {{ $setting_id }}"
                    data-day="{{ $day }}" data-meal="lunch-snack" data-type="{{ $setting_id }}">
                    @foreach ($food_logs as $food)
                        @if ($food->meal_code == 4 && $food->meal_date == $date_in_week && $food->food_type == $setting_id)
                            <div class="ui-sortable ui-sortable-meal">
                                <div class="menu-body">
                                    <div class="col col-food-name" data-energy="{{ $food->energy }}"
                                        data-protein="{{ $food->protein }}" data-fat="{{ $food->fat }}"
                                        id="{{ $food->food_id }}">
                                        {{ $food->food_thai }}
                                    </div>
                                    <div class="col col-delete">
                                        <a class="pull-right">
                                            <span><i class="fas fa-times"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="placeholder">
                        <div class="text-center menu-body ui-sortable-handle ui-sortable-placeholder ui-state-disabled">
                            <span class=""><i class="fa fa-hand-pointer-o"></i>???????????????????????????</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif-->
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col col-lg-1 no-padding-right">
                    <div class="mlabel font-bold">????????????????????????</div>
                </div>
                <div class="col col-nutrition">        
                    <div class="energy">
                        <div class="nut-labels row">
                            <div class="col col-lg-3">?????????????????????</div>
                            <!-- <div class="col text-right">
                                <span class="current"> 0 </span>
                                <span> / </span>
                                <span class="target"> //// </span>
                                <span class="unit"> ????????????????????????????????? </span>
                            </div> -->
                        </div>
                        <div class="nut-bars">
                            <div class="nut-bar toolow danger">????????????????????????</div>
                            <div class="nut-bar low warning">????????????</div>
                            <div class="nut-bar ok">????????????</div>
                            <div class="nut-bar high warning">?????????</div>
                            <div class="nut-bar toohigh danger">?????????????????????</div>
                        </div>
                    </div>
                </div>
                <div class="col col-nutrition">  
                    <div class="protein">
                        <div class="nut-labels row">
                            <div class="col col-lg-3">??????????????????</div>
                            <!-- <div class="col text-right">
                                <span class="current"> 0 </span>
                                <span> / </span>
                                <span class="target"> 400-550 </span>
                                <span class="unit"> ???????????? </span>
                            </div> -->
                        </div>
                        <div class="nut-bars">
                            <div class="nut-bar toolow danger">????????????????????????</div>
                            <div class="nut-bar low warning">????????????</div>
                            <div class="nut-bar ok">????????????</div>
                            <div class="nut-bar high warning">?????????</div>
                            <div class="nut-bar toohigh danger">?????????????????????</div>
                        </div>
                    </div>
                </div>
                <div class="col col-nutrition">  
                    <div class="fat">
                        <div class="nut-labels row">
                            <div class="col col-lg-3">???????????????</div>
                            <!-- <div class="col text-right">
                                <span class="current"> 0 </span>
                                <span> / </span>
                                <span class="target"> 400-550 </span>
                                <span class="unit"> ???????????? </span>
                            </div> -->
                        </div>
                        <div class="nut-bars">
                            <div class="nut-bar toolow danger">????????????????????????</div>
                            <div class="nut-bar low warning">????????????</div>
                            <div class="nut-bar ok">????????????</div>
                            <div class="nut-bar high warning">?????????</div>
                            <div class="nut-bar toohigh danger">?????????????????????</div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-2 text-center m-t">  
                    <!-- <button id="" class="btn btn-outline btn-primary">?????????????????????????????????</button> -->
                    <div class="btn-group open">
                        <button data-toggle="dropdown" class="btn btn-outline btn-primary" aria-expanded="true"> 
                            ?????????????????????????????????
                        </button>
                        <div class="dropdown-menu">
                            <div class="row">
                                
                            </div>
                            <div class="carbohydrate">
                                <span>????????????????????????????????????</span>
                                <span class="pull-right nut-bar selected ">????????????</span>
                            </div>
                            <div class="vitamin_a">
                                <span>??????????????????????????? </span>
                                <span class="pull-right nut-bar selected ">????????????</span>
                            </div>
                            <div class="vitamin_b1">
                                <span>??????????????????????????? 1 </span>
                                <span class="pull-right nut-bar selected ">????????????</span>
                            </div>
                            <div class="vitamin_b2">
                                <span>??????????????????????????? 2 </span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div>
                            <div class="vitamin_c">
                                <span>??????????????????????????? </span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div>
                            <div class="iron">
                                <span>???????????????????????????</span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div>
                            <div class="calcium">
                                <span>????????????????????????</span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div>
                            <div class="phosphorus">
                                <span>???????????????????????? </span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div>
                            <!-- <div class="fiber">
                                <span>????????????????????? </span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div>
                            <div class="sodium">
                                <span>????????????????????? </span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div>
                            <div class="sugar">
                                <span>??????????????????</span>
                                <span class="pull-right nut-bar selected">????????????</span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
