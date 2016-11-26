<div ng-app="app.Member" ng-controller="ImageCopperController" ng-clock >
    <div  ng-show="imageCropStep == 1" class="fileinput-cover-button">
        <div style="position: relative">
            <div>
                <img  style=" height: 100px; width: 100px;  " class="img-responsive" fallback-src="<?php echo base_url() ?>resources/images/add_photo_album.jpg"  ng-src="<?php echo base_url() ?>resources/images/add_photo_album.jpg"/>
            </div>
            <div style="position: absolute; z-index: 11; top: 25px; height: 100px; width: 100px; background: transparent;overflow: hidden; ">
                <input  class="profile_cover_upload_input"  type="file" name="fileInput" id="fileInput" onchange="angular.element(this).scope().fileChanged(event)"/>
            </div>
            <div class="profile_cover_upload_img">
                <span>Upload a picture</span>
            </div>
        </div>
    </div>	
    <div ng-show="imageCropStep == 2" class="zoom_disable">
        <image-crop			 
            data-height="100"
            data-width="100"
            data-shape="square"
            data-step="imageCropStep"
            src="imgSrc"
            data-result="result"
            data-result-blob="resultBlob"
            crop="initCrop"
            padding="0"
            max-size="1012"
            imagepath="<?php echo base_url(); ?>pages/add_cover_picture/"
            reloadpath = ""
            ></image-crop>	   
    </div>
    <div ng-show="imageCropStep == 2">
        <button class="btn btn-sm"   ng-click="initCrop = true">Save</button>		
        <button class="btn btn-sm"  ng-click="clear()">Cancel</button>
    </div>		  
    <div  ng-show="imageCropStep == 3">
        <div >
            <img ng-src="{{result}}"/>
        </div>
    </div>
</div>