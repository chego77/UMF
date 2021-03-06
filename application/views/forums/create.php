<div class="col-md-12">
        <div class="page-header">
            <h1 class="text-center"><?php echo lang('forums_thread_new'); ?></h1>
        </div>
        <?php echo validation_errors();
        echo form_open('', array('role' => 'form'));
        ?>
        <script>
        $(function() {
            $('#thread-title').change(function() {
                var title = $('#thread-title').val().toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
                $('#thread-slug').val(title);
            });
        });
        </script>
        <div class="form-group">
        <?php
        echo form_label(lang('forums_name'), 'thread-title');
        echo form_input(array('name' => 'thread-title', 'id' => 'thread-title', 'class' => 'form-control'), set_value('thread-title'));
        ?>
        </div><div class="form-group">
        <?php
        echo form_label(lang('forums_slug'), 'thread-slug');
        echo form_input(array('name' => 'thread-slug', 'id' => 'thread-slug', 'class' => 'form-control'), set_value('thread-slug'));
        ?>
        <p class="help-block"><?php echo lang('slug_exp'); ?></p>
        </div><div class="form-group">
        
        <!--
        <link rel="stylesheet" href="resources/jquery/jwysiwyg/jquery.wysiwyg.css"/>
        <script src="resources/jquery/jwysiwyg/jquery.wysiwyg.js" charset="utf-8"></script>
        <script src="resources/jquery/jwysiwyg/controls/wysiwyg.link.js" charset="utf-8"></script>
        
        <script>
            controlValue = {
                    justifyLeft: { visible : false },
                    justifyCenter: { visible : false },
                    justifyRight: { visible : false },
                    justifyFull: { visible : false },
                    insertHorizontalRule: { visible: false },
                    insertTable: { visible: false },
                    insertImage: { visible: false },
                    h1: { visible: false },
                    h2: { visible: false },
                    h3: { visible: false }
                };
            cssValue = {
                    fontFamily: 'Verdana',
                    fontSize: '13px'
                };
            $(document).ready(function(){
                $('#firstpost').wysiwyg({
                    initialContent: '', html: '',
                    controls: controlValue,
                    css: cssValue,
                    autoGrow: true
                });
            });
        </script>
        -->
        <?php
        echo form_label(lang('forums_initial_post'), 'thread-post');
        echo form_textarea(array('class' => 'form-control', 'name' => 'thread-post', 'id' => 'thread-post'), set_value('thread-post'));
        echo '</div>';
        echo form_submit(array('class' => 'btn btn-primary btn-large pull-right', 'name' => 'thread-create'), lang('forums_thread_create'));
        echo form_close();
        ?>
    </div>