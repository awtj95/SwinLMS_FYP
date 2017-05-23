<form name='insertevent' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month; ?>&day=<?php echo $day; ?>&year=<?php echo $year; ?>&v=true&add=true&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>">
    <table>
        <tr width='400px'>
            <td width='150px'>Title</td>
            <td width='250px'>
                  <input type="hidden" class="form-control" name="unit_id" value="<?php echo $_SESSION['unit_id']; ?>">
                  <input type="text" class="form-control" name="title" placeholder="Title">
            </td>
        </tr>
        <br />
        <tr>
            <td width='150px'>Detail</td>
            <td width='85%'>
                <textarea class="textarea" name="detail" placeholder="Detail" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align='center'>
                <input type='submit' class="btn btn-default pull-center" name='addevent' value='Add Event'>
            </td>
        </tr>
    </table>
</form>