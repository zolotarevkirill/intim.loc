<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $db = new PDO('mysql:host=localhost', 'root', '');
        $db->exec('use base');
        $db->exec('SET NAMES utf8');
        ?>

        <table>
            <tr>
                <td style="vertical-align: top;">
                    <ul>
                        <?php
                        $q = $db->query("SELECT * FROM category WHERE parent_id IS NULL");

                        while ($r = $q->fetchObject()) {
                            print "<li><a href='?cat={$r->id}'>{$r->title}</a></li>";


                            $q1 = $db->query("SELECT * FROM category WHERE parent_id = '{$r->id}'");
                            print '<ul>';
                            while ($r1 = $q1->fetchObject()) {
                                print "<li><a href='?cat={$r1->id}'>{$r1->title}</a></li>";
                            }
                            print '</ul>';
                        }
                        ?>
                    </ul>
                </td>
                <td style="vertical-align: top;">
                    <?php if ($_GET['cat']): ?>
                        <?php
                        $q2 = $db->query("SELECT * FROM data WHERE category_id = '{$_GET['cat']}'");
                        while ($r2 = $q2->fetchObject()) {
                            ?>
                            <table style="float: left; margin: 5px;" border="1">
                                <tr>
                                    <td style="width: 200px; height: 200px;">
                                        <img src="<?= $r2->URL ?>" style="max-width: 200px; max-height: 200px; display: block;" />
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td style="height: 100px; text-align: center;"><?= $r2->NAME ?></td>
                                </tr>
                            </table>

                            <?php
                        }
                        ?>

                    <?php endif; ?>
                </td>
            </tr>
        </table>

    </body>
</html>
