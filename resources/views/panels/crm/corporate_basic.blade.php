<?php foreach ($hdcorporatecont as $hdcorporatecont) { ?>
                {id: <?=$hdcorporatecont->hl_ccb_id?>, firstName: '<?=$hdcorporatecont->hl_business_name?>', lastName: '<?=$hdcorporatecont->hl_head_office_address?>'},

                <?php } ?>