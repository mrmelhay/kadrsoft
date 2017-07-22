<div class="row">
    <div class="col-md-10">
        <div class="block-web">
            <div class="porlets-content">


                <div class="form-group">
                    <label class="col-sm-5 control-label">Қўлланилган интизомий чора</label>
                    <div class="col-sm-7">
                        <input type="text" name="intizomchora" class="form-control" id="intizomchora" value="<?php echo $intizomchora['intizomchora'];?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Интизомий чора кўрилган сана</label>
                    <div class="col-sm-7">
                        <input type="text" name="intizomchora_begin" class="form-control" id="intizomchora_begin" value="<?php echo $intizomchora['intizomchora_begin'];?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Интизомий чора якунланиш санаси</label>
                    <div class="col-sm-7">
                        <input type="text" name="intizomchora_muddat" class="form-control" id="intizomchora_muddat" value="<?php echo $intizomchora['intizomchora_muddat'];?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>





<script>
    $(document).ready(function() {
        $(".select22").select2();
    });


    $( function() {
        $( "#intizomchora_begin, #intizomchora_muddat").datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );
</script>