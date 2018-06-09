<?php if (!empty($_POST['color']) && preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $_POST['color'])): ?>
    <?php $color = $_POST['color']; ?>
<?php elseif (!empty($_COOKIE['color'])): ?>
    <?php $color = $_COOKIE['color']; ?>
<?php else: ?>
    <?php $color = '#7bd148'; ?>
<?php endif; ?>

<?php if (!empty($_POST['layout'])): ?>
    <?php $layout = $_POST['layout']; ?>
<?php elseif (!empty($_COOKIE['layout'])): ?>
    <?php $layout = $_COOKIE['layout']; ?>
<?php else: ?>
    <?php $layout = 'default'; ?>
<?php endif; ?>

<?php echo $args['before_widget']; ?>
    <form id="wb-customizer" method="post">
        <div class="form-group">
            <label for="color">Color schemes</label>
            <p class="help-block">Hey, choose a predefined color scheme fot the site.</p>
            <select class="form-control" id="color" name="color">
                <option value="#2ecc71">Green</option>
                <option value="#5484ed">Bold blue</option>
                <option value="#a4bdfc">Blue</option>
                <option value="#46d6db">Turquoise</option>
                <option value="#7ae7bf">Light green</option>
                <option value="#51b749">Bold green</option>
                <option value="#fbd75b">Yellow</option>
                <option value="#ffb878">Orange</option>
                <option value="#ff887c">Red</option>
                <option value="#dc2127">Bold red</option>
                <option value="#dbadff">Purple</option>
                <option value="#e1e1e1">Gray</option>
            </select>
        </div>
        <div class="form-group">
            <label for="layoutpicker">Layout options</label>
            <p class="help-block">Wheather to enable or disable boxed layout for the site.</p>
            <div class="checkbox">
                <input type="checkbox" id="layoutpicker" name="layoutpicker" data-toggle="toggle" data-size="mini" />
            </div>
        </div>
        <input type="hidden" name="layout" value="default" />
    </form>

    <p>
        <small>*You can customize more options from admin panel.</small>
    </p>

    <script type="text/javascript">
        (function($) {
            $('select[name="color"]').simplecolorpicker({theme: 'fontawesome'}).simplecolorpicker('selectColor', '<?php echo $color; ?>').on('change', function() {
                $('#wb-customizer').submit();
            });

            <?php if ($layout == 'boxed'): ?>
                $('input[name="layoutpicker"]').bootstrapToggle('on');
            <?php endif; ?>

            $('input[name="layoutpicker"]').change(function() {
                if($( this ).prop( "checked" )) {
                    $('input[name="layout"]').val('boxed');
                } else {
                    $('input[name="layout"]').val('default');
                }
                $('#wb-customizer').submit();
            });
        })(jQuery);
    </script>
<?php echo $args['after_widget']; ?>
