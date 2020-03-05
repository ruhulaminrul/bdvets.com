@extends('layout.app')
@section('content')


<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-xl-8 col-lg-8 col-md-8   ">

            <div class="card mb-4 shadow collapse" id="villageStore">


                <div class="card-header py-3 bg-abasas-dark">
                    <nav class="navbar navbar-dark ">
                        <a class="navbar-brand"> New Farmer</a>

                    </nav>
                </div>


                <div class="card-body">





                    <form action="{{route('village-store')}}" method="post">
                        @csrf


                        <input type="text" class="form-control form-control" name="division_id" id="setDivision" hidden required>
                        <input type="text" class="form-control form-control" name="district_id" id="setDistrict" hidden required>
                        <input type="text" class="form-control form-control" name="upazilla_id" id="setUpazilla" hidden required>
                        <input type="text" class="form-control form-control" name="union_id" id="setUnion" hidden required>
                        <input type="text" class="form-control form-control" name="village_id" id="setVillage" hidden required>


                        

                        <div class="form-row align-items-center">

                        <div class="form-group col-12 ">
                                <label for="name"    class="text-dark pl-2" >Name</label>
                                <input type="text" class="form-control form-control    mb-2  " name="name" required>
                            </div>


                            <div class="form-group  col-12 ">
                                <label for="email"    class="text-dark pl-2" >Email</label>
                                <input type="email" class="form-control form-control    mb-2  " name="email">
                            </div>


                            <div class="form-group col-12 ">
                                <label for="bn_name"    class="text-dark pl-2"  >Gender</label>
                              <select name="gender" id="" class="form-control mb-2" required>
                                  <option value="">Select</option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                              </select>
                            </div>





                            <div class="form-group col-auto">
                                <label for="bn_name" class="text-dark pl-2">Cattle</label>
                                <input type="number" class="form-control form-control    mb-2  " name="cattle">
                            </div>

                            <div class="form-group col-auto">
                                <label for="url" class="text-dark pl-2">Goat</label>
                                <input type="number" class="form-control form-control    mb-2 " name="goat">
                            </div>



                            <div class="form-group col-auto">
                                <label for="bn_name" class="text-dark pl-2">Buffalo</label>
                                <input type="number" class="form-control form-control    mb-2  " name="buffalo">
                            </div>

                            <div class="form-group col-auto">
                                <label for="url" class="text-dark pl-2">Sheep</label>
                                <input type="number" class="form-control form-control    mb-2 " name="sheep">
                            </div>



                            <div class="form-group col-auto">
                                <label for="bn_name" class="text-dark pl-2">Poultry</label>
                                <input type="number" class="form-control form-control    mb-2  " name="poultry">
                            </div>

                            <div class="form-group col-auto">
                                <label for="url" class="text-dark pl-2">Chicken</label>
                                <input type="number" class="form-control form-control    mb-2 " name="chicken">
                            </div>



                            <div class="form-group col-auto">
                                <label for="bn_name" class="text-dark pl-2">Duck</label>
                                <input type="number" class="form-control form-control    mb-2  " name="duck">
                            </div>

                            <div class="form-group col-auto">
                                <label for="url" class="text-dark pl-2">Pigeon</label>
                                <input type="number" class="form-control form-control    mb-2 " name="pigeon">
                            </div>


                            <div class="form-group col-auto">
                                <label for="url">Turkey</label>
                                <input type="number" class="form-control form-control    mb-2 " name="turkey">
                            </div>


                            <div class="form-group col-auto">
                                <label for="url" class="text-dark pl-2">Other</label>
                                <input type="number" class="form-control form-control    mb-2 " name="other">
                            </div>



                            <div class=" form-group col-12">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>


                        </div>


                    </form>


                </div>
            </div>



            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-header py-3 bg-abasas-dark">
                    <nav class="navbar navbar-dark ">
                        <a class="navbar-brand"> Farmer List</a>
                        <button class="btn btn-success" data-toggle="collapse" href="#villageStore"> New Farmer</button>

                    </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered " id="farmerTable" width="100%" cellspacing="0">
                            <thead class="bg-abasas-dark">


                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tfoot class="bg-abasas-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <!-- <th>Action</th> -->
                                </tr>

                            </tfoot>
                            <tbody id='farmerTableData'>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>






        </div>

        <!-- Left Sidebar Start -->
        <div class="col-xl-4 col-lg-4 col-md-4   ">

            <div class="card mb-4 shadow">



                <div class="card-header py-3 bg-abasas-dark">
                    <nav class="navbar navbar-dark ">
                        <a class="navbar-brand"> Location</a>

                    </nav>
                </div>



                <div class="card-body">





                    <div class="form-group">
                        <lab el for="division_id">Division</lab>
                        <select class="form-control form-control" name="division_id" id="division_id" required>
                            <option value="">Select Division </option>
                            @foreach ($divisions as $division)
                            <option value="{{$division->id}}"> {{$division->bn_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="district_id">district</label>
                        <select class="form-control form-control" name="district_id" id="district_id" required>
                            <option value="">Select district </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="upazilla_id">Upazilla</label>
                        <select class="form-control form-control" name="upazilla_id" id="upazilla_id" required>
                            <option value="">Select Upazilla </option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="union_id">Union</label>
                        <select class="form-control form-control" id="union_id" required>
                            <option value="">Select Union </option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="village_id">Villlage</label>
                        <select class="form-control form-control" id="village_id" required>
                            <option value="">Select Union </option>

                        </select>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <!-- Content Modal  -->
    <div class="modal fade" id="village-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="edit-modal-label ">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content">
                    <form id="edit-form" class="form-horizontal" method="POST" action="">
                        @csrf



                        <!-- id -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-id">Id </label>
                            <input type="text" name="id" class="form-control" id="modal-village-id" required readonly>
                        </div>
                        <!-- /id -->
                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">Name</label>
                            <input type="text" name="name" class="form-control" id="modal-village-name" required autofocus>
                        </div>
                        <!-- /name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">BN Name</label>
                            <input type="text" name="bn_name" class="form-control" id="modal-village-bn_name" required autofocus>
                        </div>
                        <!-- /name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">Url</label>
                            <input type="text" name="url" class="form-control" id="modal-village-url" required autofocus>
                        </div>
                        <!-- /name -->

                        <div class="form-group">

                            <input type="submit" value=" সাবমিট" class="form-control btn btn-success">
                        </div>
                        <!-- /description -->




                    </form>
                </div>

            </div>
        </div>
    </div>



    @endsection