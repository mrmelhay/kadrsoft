<div class="row">
    <div class="col-md-6">
        <div class="block-web">

            <div class="porlets-content">
                <form action="" class="form-horizontal row-border">
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Паспорт серия</label>
                        <div class="col-sm-5">
                            <input type="text" name="ps_ser" id="ps_ser" class="form-control" maxlength="2" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label">Паспорт номери</label>
                        <div class="col-sm-5">
                            <input type="number" name="ps_num" id="ps_num" class="form-control" maxlength="7" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-5 control-label">Берилган вақти</label>
                        <div class="col-sm-5 input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="date_of_given" id="date_of_given">
                            <span class="input-group-btn add-on">
                      <button type="button" class="btn btn-danger"><i class="fa fa-calendar"></i></button>
                      </span>
                        </div>
                    </div>

                                        <div class="form-group">
                        <label class="col-sm-5 control-label">Амал қилиш муддати</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="date_of_expr" id="date_of_expr">
                            <span class="input-group-btn add-on">
                      <button type="button" class="btn btn-danger"><i class="fa fa-calendar"></i></button>
                      </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="block-web">
            <div class="porlets-content">
                <form action="" class="form-horizontal row-border">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Давлат</label>
                        <div class="col-sm-9">
                            <div class="input-group" >
                                <input type="text" class="form-control" name="davlat_id" id="davlat_id">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Вилоят</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="viloyat_id" id="viloyat_id">
                                </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Туман</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="tuman_id" id="tuman_id">
                                </div>
                        </div>
                    </div>
                    <div class="form-group icheck ">
                        <label class="col-sm-3 control-label">Статус</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                            <input type="checkbox" name="is_active" id="is_active">



                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>






</div>

