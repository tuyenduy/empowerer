<form method="post" action="settings_general" class="checkcheck">
    <nav class="navbar navbar-default navbar-static-top">
        <h1><i class="fa fa-empire"></i> Empower <small>v1.1</small><span class="right">  </span> </h1>
    </nav>

    <?php
    settings_errors();
    $settings = json_decode(get_option('empowerer_settings'));
    ?>

    <div class="row" style="position:relative">
        <div class="col-xs-2">
            <ul class="nav nav-tabs tabs-left">
                <li class="active"><a href="#general" data-toggle="tab">General Settings</a></li>
                <li><a href="#contact_tab" data-toggle="tab">Contacts & Socials</a></li>
                <!--                <li><a href="#block_tab" data-toggle="tab">Blocks</a></li>
                                <li><a href="#row" data-toggle="tab">Rows</a></li>
                                <li><a href="#layout" data-toggle="tab">Layouts</a></li>
                                <li><a href="#header" data-toggle="tab">Header</a></li>
                                <li><a href="#footer" data-toggle="tab">Footer</a></li>
                                <li><a href="#sidebar" data-toggle="tab">Sidebars</a></li>
                                <li><a href="#typo" data-toggle="tab">Typography</a></li>-->
                <li><a href="#theme_tab" data-toggle="tab">Theme Selection</a></li>
                <!--                <li><a href="#offer" data-toggle="tab">Offers</a></li>-->
            </ul>
        </div>
        <div class="col-xs-8">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="row">
                        <div class="col-md-4 center-block">
                            <?php
                            $logo = $settings->logo_image;
                            ?>
                            <button class="btn btn-primary" id="upload-button"><i class="fa fa-upload"></i> Upload Website Logo </button>
                            <input type="hidden" name="logo_image" value="<?php echo $logo ?>" id="logo-picture" />
                        </div>
                        <div class="col-md-8">
                            <div class="image-container">
                                <div id="logo-picture-preview" style="background-image:url('<?php echo $logo ?>')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="theme_tab">
                    <div class="section-preview">
                        <?php
                        $theme_uri = get_template_directory_uri() . '/bootstrap/css/themes/';
                        $theme_dir = get_template_directory() . '/bootstrap/css/themes/';
                        $dirs = array_filter(glob($theme_dir . '/*'), 'is_dir');
                        $cur_theme = $settings->bootstrap_theme_id;

                        if (!empty($dirs)) {

                            foreach ($dirs as $dir) {
                                $theme = basename($dir);
                                ?>
                                <div class="col-xs-6">
                                    <div class="preview">
                                        <div class="image">
                                            <img src="<?php echo $theme_uri . $theme . '/thumbnail.png'; ?>" class="img-responsive" />
                                        </div>
                                        <div class="options">
                                            <h3><label><input type="radio" name="bootstrap_theme_id" value="<?php echo ucfirst($theme) ?>" <?php if (ucfirst($theme) == $cur_theme) echo "checked"; ?> /><?php echo ucfirst($theme) ?></label></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="floating_submit">
    <button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</div>
<div class="push-notification">
    <!--    <div id="feedback-content"></div>-->
</div>
</form>

<div class = "clearfix"></div>