@extends('layouts.app')
@section('content')
<aside id="aside-menu" class="p-t">
    @include('kids.sidemenu')
</aside>
<div id="wrapper">
    <div class="row">
        <div class="col-md-6">
            @if ($classroom == null)
                <div>ยังไม่มีห้องเรียน</div>
            @else
                <h1 class="page-title">ห้อง {{$classroom->class_name}}</h1>
            @endif
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <a class="btn btn-default" data-toggle="modal" data-target="#editClassroomForm"> 
                    <span> <i class="far fa-edit"></i> แก้ไขชื่อห้องเรียน</span>
                </a>
                @if ($classroom->getKidCount()>0)
                <a class="btn btn-default" data-toggle="modal" data-target="#classNotEmptyError"> 
                @else
                <a id="toggleClassBtn" class="btn btn-default" href="/classroom/toggle/{{$classroom->id}}">
                @endif
                    <span>
                        <i class="fas fa-minus-circle"></i> 
                        {{($classroom->active?'ปิดห้องเรียนชั่วคราว':'เปิดห้องเรียน')}}
                    </span>
                </a>
                @if ($classroom->getKidCount()>0)
                <a class="btn btn-default" data-toggle="modal" data-target="#classNotEmptyError"> 
                @else
                <a class="btn btn-default" data-toggle="modal" data-target="#deleteClassConfirmation"> 
                @endif
                    <span> <i class="far fa-trash-alt"></i> ลบห้องเรียนถาวร</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <h4 class="title"> ข้อมูลโดยรวม </h4>
                    <div class="row m-b">
                        <div class="col-lg-4 text-right">
                            <i class="light-icon fas fa-child fa-3x"></i>
                        </div>
                        <div class="col-lg-8">
                            <div class="">จำนวนเด็ก</div>
                            <div class="text-extra">{{$classroom->getKidCount()}} <span>คน</span></div>
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-lg-4 text-right">
                            เด็กสุด
                        </div>
                        <div class="col-lg-8">
                            {{$classroom->getMinAge()}}
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-lg-4 text-right">
                            โตสุด
                        </div>
                        <div class="col-lg-8">
                            {{$classroom->getMaxAge()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <h4 class="title"> การเจริญเติบโต </h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row m-b">
                                <div class="col-lg-5 text-right">
                                    <i class="light-icon fas fa-ruler-vertical fa-3x"></i>
                                </div>
                                <div class="col-lg-7">
                                    <div class="">ส่วนสูงโดยเฉลี่ย</div>
                                    <div class="text-extra">{{$classroom->getAverageHeight()}} <span>ซม.</span></div>
                                </div>
                            </div>
                            <div class="row m-b">
                                <div class="col-lg-5 text-right">
                                    ค่าสูงสุด
                                </div>
                                <div class="col-lg-7">
                                    {{$classroom->getMaxHeight()}}
                                </div>
                            </div>
                            <div class="row m-b">
                                <div class="col-lg-5 text-right">
                                    ค่าต่ำสุด
                                </div>
                                <div class="col-lg-7">
                                    {{$classroom->getMinHeight()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row m-b">
                                <div class="col-lg-5 text-right">
                                    <i class="light-icon fas fa-weight fa-3x"></i>
                                </div>
                                <div class="col-lg-7">
                                    <div class="">น้ำหนักโดยเฉลี่ย</div>
                                    <div class="text-extra">{{$classroom->getAverageWeight()}} <span>กก.</span></div>
                                </div>
                            </div>
                            <div class="row m-b">
                                <div class="col-lg-5 text-right">
                                    ค่าสูงสุด
                                </div>
                                <div class="col-lg-7">
                                    {{$classroom->getMaxWeight()}}
                                </div>
                            </div>
                            <div class="row m-b">
                                <div class="col-lg-5 text-right">
                                    ค่าต่ำสุด
                                </div>
                                <div class="col-lg-7">
                                    {{$classroom->getMinWeight()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <h4 class="title"> การดื่มนม </h4>
                    <div class="row m-b">
                        <div class="col-lg-5 text-right">
                            <i class="light-icon fas fas fa-prescription-bottle fa-3x"></i>
                        </div>
                        <div class="col-lg-7">
                            <div class="">ดื่มนมโดยเฉลี่ย</div>
                            <div class="text-extra"> {{$classroom->getMilkMl()}} <span>มล.</span></div>
                        </div>
                    </div>
                    <div class="text-center m-b">
                        <span>คิดเป็นนมกล่อง </span>
                        <span> {{$classroom->getMilkBox()}} กล่อง </span>
                    </div>
                    <div class="text-center m-b">
                        <span>คิดเป็นออนซ์ </span>
                        <span> {{$classroom->getMilkOz()}} ออนซ์ </span>
                    </div>
                    <!-- <div class="row m-b">
                        <div class="col-lg-4 text-right">
                            คิดเ
                        </div>
                        <div class="col-lg-8">
                            0 ปี 11 เดือน
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-lg-4 text-right">
                            โตสุด
                        </div>
                        <div class="col-lg-8">
                            1 ปี 11 เดือน
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        
    </div>
    <div>
    <h3>ข้อมูลเด็กในห้อง</h3>
    <div class="table-responsive">
        <table cellpadding="1" cellspacing="1" class="table table-condensed table-striped">
            <thead>
            <tr>
                <th>ชื่อ-นามสกุล</th>
                <th>ชื่อเล่น</th>
                <th>เพศ</th>
                <th>อายุ</th>
                <th>ส่วนสูง (ซม.)</th>
                <th>น้ำหนัก (กก.)</th>
                <th>อาหาร</th>
                <th>ดื่มนมต่อวัน (มล.)</th>
                <th>จัดการ</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($classroom->getKids() as $k)
                    <tr>
                        <td><a href="/kid/{{$k->id}}" class="">{{$k->firstname.' '.$k->lastname}}</a></td>
                        <td>{{$k->nickname}}</td>
                        <td>{{$k->getSex()}}</td>
                        <td>{{$k->getAge()}}</td>
                        <td>
                            @if($k->getLastestGrowth())
                                {{$k->getLastestGrowth()->height}}
                            @endif
                        </td>
                        <td>
                            @if($k->getLastestGrowth())
                                {{$k->getLastestGrowth()->weight}}
                            @endif
                        </td>
                        <td>
                        @foreach ($k->getRestrictions() as $rest)
                            <div class="text-danger">{{$rest['type']}}</div>
                            <div class="">{{$rest['detail']}}</div>
                        @endforeach

                        </td>
                        <td>{{$k->getMilk('ml')}} </td>
                        <td>
                            <a class="" data-toggle="modal" data-target="#moveKidForm{{$k->id}}">
                                <span><i class=""></i> ย้ายห้อง </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>




<div class="modal fade" id="editClassroomForm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="color-line "></div>             -->
            <div class="modal-body">
                <h4 class="modal-title">แก้ไขห้องเรียน</h4>
                <form method="POST" action="/classroom/edit/{{$classroom->id}}" class="">   
                    @csrf 
                    <div class="form-group">
                        <label class="control-label">ชื่อห้องเรียน</label>
                        <input type="text" value="" name="class_name" class="form-control {{ $errors->hasBag('editclass') ? 'is-invalid' :'' }}" required>
                        @if ($errors->hasBag('editclass'))
                            <span class="invalid-feedback" role="alert">
                                <strong>"ชื่อห้องเรียนนี้มีอยู่แล้ว"</strong>
                            </span>
                            <script type="text/javascript">
                                $("#editClassroomForm").modal('show');
                            </script>
                        @endif
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" type="submit" name="create" value="">บันทึกการเปลี่ยนแปลง</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($classroom->getKids() as $kid)
<div class="modal fade" id="moveKidForm{{$kid->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                @include('kids._moveKidForm')
            </div>
        </div>
    </div>
</div> 
@endforeach

<div class="modal fade" id="classNotEmptyError" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="icon-primary fas fa-exclamation-circle fa-5x m-b"></i>
                <h2 class="text-highlight modal-title">ดูเหมือนว่ายังมีเด็กในห้องเรียนอยู่</h2>
                <h3 class="m-b">กรุณาย้ายเด็กออกจากห้องก่อนทำการปิดหรือลบห้องเรียน</h3>
                <button type="button" class="btn btn-default m-b" data-dismiss="modal">เข้าใจแล้ว</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteClassConfirmation" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="icon-primary fas fa-exclamation-circle fa-5x m-b"></i>
                <h2 class="text-highlight modal-title">คุณแน่ใจหรือไม่?</h2>
                <h4 class="m-b">คุณกำลังลบห้องเรียนอย่างถาวรและคุณจะไม่สามารถกู้คืนได้</h4>
                <button type="button" class="btn btn-default" data-dismiss="modal">ไม่, ฉันไม่ต้องการลบ</button>
                <a id="deleteClassBtn" class="btn btn-primary" href="/classroom/delete/{{$classroom->id}}">
                    <span>ใช่, ลบห้องเรียนเลย</span>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
