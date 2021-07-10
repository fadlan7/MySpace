<div class="col-md-4">
    <div class="card card-success shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Daily Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo form_open('sales_report/daily') ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Date</label>
                        <select name="date" class="form-control">
                            <?php
                            $start = 1;
                            for ($i = $start; $i < $start + 31; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Month</label>
                        <select name="month" class="form-control">
                            <?php
                            $start = 1;
                            for ($i = $start; $i < $start + 12; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Year</label>
                        <select name="year" class="form-control">
                            <?php
                            $start = date('Y');
                            for ($i = $start; $i < $start + 15; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Print Report</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="card card-success shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Monthly Report</h3>
        </div>
        <div class="card-body">
            <?php echo form_open('sales_report/monthly') ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Month</label>
                        <select name="month" class="form-control">
                            <?php
                            $start = 1;
                            for ($i = $start; $i < $start + 12; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Year</label>
                        <select name="year" class="form-control">
                            <?php
                            $start = date('Y');
                            for ($i = $start; $i < $start + 15; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Print Report</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-success shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Yearly Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        </div>
    </div>
</div>