<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Address Book by Pauline Joy Garcia</title>

        <style type="text/css">

            ::selection{ background-color: #E13300; color: white; }
            ::moz-selection{ background-color: #E13300; color: white; }
            ::webkit-selection{ background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body{
                margin: 0 50px 0 15px;
            }

            p.footer{
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container{
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
                width: 800px;
                margin: 0 auto;
            }
        </style>
        <?php if($mode == "Edit") {?>
            <script type="text/javascript" charset="utf-8">
                function set_defaults() {
                    var input = document.getElementsByName("first_name");
                    var hidden = document.getElementsByName("fn");
                    input[0].value = hidden[0].value;
                    var input = document.getElementsByName("middle_name");
                    var hidden = document.getElementsByName("mn");
                    input[0].value = hidden[0].value;
                    var input = document.getElementsByName("last_name");
                    var hidden = document.getElementsByName("ln");
                    input[0].value = hidden[0].value;
                    var input = document.getElementsByName("address");
                    var hidden = document.getElementsByName("ad");
                    input[0].value = hidden[0].value;
                    var input = document.getElementsByName("phone_number");
                    var hidden = document.getElementsByName("pn");
                    input[0].value = hidden[0].value;
                }
            </script>
        <?php } ?>
    </head>
    <body onload="set_defaults()">

        <div id="container">
            <h1>Address Book - <?php echo $mode ?></h1>

            <div id="body">
                <?php
                    $hidden = array();
                    $hidden['current_id'] = $current_id;
                    if($address_book !== false) {
                        $hidden['fn'] = $address_book->first_name;
                        $hidden['mn'] = $address_book->middle_name;
                        $hidden['ln'] = $address_book->last_name;
                        $hidden['ad'] = $address_book->address;
                        $hidden['pn'] = $address_book->phone_number;
                    }
                ?>
                <?php echo form_open( 'addressbook_c/input', '', $hidden ); ?>
                    <?php echo form_label( 'First Name: ', 'first_name' ); ?>
                    <?php echo form_input( 'first_name', set_value( 'first_name' ), 'size="50"' ); ?>
                    <?php echo form_error( 'first_name' ); ?><br/>

                    <?php echo form_label( 'Middle Name: ', 'middle_name' ); ?>
                    <?php echo form_input( 'middle_name', set_value( 'middle_name' ), 'size="50"' ); ?>
                    <?php echo form_error( 'middle_name' ); ?><br/>

                    <?php echo form_label( 'Last Name: ', 'last_name' ); ?>
                    <?php echo form_input( 'last_name', set_value( 'last_name' ), 'size="50"' ); ?>
                    <?php echo form_error( 'last_name' ); ?><br/>

                    <?php echo form_label( 'Address: ', 'address' ); ?>
                    <?php echo form_input( 'address', set_value( 'address' ), 'size="100"' ); ?>
                    <?php echo form_error( 'address' ); ?><br/>

                    <?php echo form_label( 'Phone Number: ', 'phone_number' ); ?>
                    <?php echo form_input( 'phone_number', set_value( 'phone_number' ), 'size="50"' ); ?>
                    <?php echo form_error( 'phone_number' ); ?><br/>
                
                    <?php echo form_submit( 'submit', 'Save' ); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </body>
</html>