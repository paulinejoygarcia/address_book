<html>
    <head>
        <style type="text/css">
            #menu {
                padding: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
                width: 800px;
                margin: 0 auto;
            }
            
            #menu a {
                margin-right: 15px;
            }
        </style>
    </head>
    <div id="menu">
        <?php echo anchor('addressbook_c/', 'List', 'class="link-class"') ?>
        <?php echo anchor('addressbook_c/input', 'Add', 'class="link-class"') ?>
    </div>
</html>