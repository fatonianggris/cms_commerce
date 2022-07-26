<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tambah Blog</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
            <ol class="breadcrumb">
                <li><a href="#"> Blog</a></li>              
                <li class="active">Tambah Blog</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <form data-toggle="validator">
                    <h3 class="box-title m-b-0">Formulir Tambah Blog</h3>
                    <p class="text-muted m-b-30"> Bootstrap Form Validation</p>                   
                    <div class="col-md-8">
                        <div class="form-group"> 
                            <label for="judul" class="control-label">Judul Konten Blog *</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                <input type="text" class="form-control" name="judul_blog" id="judul" placeholder="Isikan Judul Konten Blog Anda" required>
                            </div>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Tokopedia, OVO dan Grab Bersatu Perangi Kemiskinan"</small>  

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Tag Blog *</label>
                            <input type="text" name="tag_blog" data-role="tagsinput" placeholder="Inputkan Tag" />                          
                            <small class="form-text"><b class="text-danger">*TIDAK</b> wajib disi, <b class="text-danger">Contoh :</b> "Berita, Tokopedia, Kemiskinan"</small>
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <label class="control-label">Isi Konten Blog</label>
                            <textarea class="form-control" rows="15" id="konten_blog" name="isi_blog"></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b> diisi, <b class="text-danger">Contoh :</b> "Jakarta, 24 Maret 2020 – Tokopedia, OVO dan Grab — ekosistem digital terbesar di</br>
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; Indonesia — mendonasikan masing-masing Rp1 miliar (total Rp3 miliar) untuk membantu</br>
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; memerangi COVID-19."</small> 

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Upload Gambar Header</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" id="input-file-now" name="gambar_blog" class="dropify" data-height="400" data-max-file-size="3M" data-allowed-file-extensions="jpeg jpg png" required/>
                            </div>
                        </div>
                        <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 3Mb (logo diutamakan resolusi 750*500 pixel)"</small>  
                    </div>                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
