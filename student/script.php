<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("student_in_course");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
function myFunction1() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("tutorial_submission_in_course");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("assignment_submission_in_course");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
function myFunction3() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("attendance_in_course");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script type="text/javascript">
function play_game() 
{
    var level = 160; // Game level, by decreasing will speed up
    var rect_w = 45; // Width 
    var rect_h = 30; // Height
    var inc_score = 50; // Score
    var snake_color = "#006699"; // Snake Color
    var ctx; // Canvas attributes
    var tn = []; // temp directions storage
    var x_dir = [-1, 0, 1, 0]; // position adjusments
    var y_dir = [0, -1, 0, 1]; // position adjusments
    var queue = []; 
    var frog = 1; // defalut food
    var map = [];
    var MR = Math.random; 
    var X = 5 + (MR() * (rect_w - 10))|0; // Calculate positions
    var Y = 5 + (MR() * (rect_h - 10))|0; // Calculate positions
    var direction = MR() * 3 | 0; 
    var interval = 0;
    var score = 0;
    var sum = 0, easy = 0;
    var i, dir;
    // getting play area 
    var c = document.getElementById('playArea');
    ctx = c.getContext('2d');
    // Map positions
    for (i = 0; i < rect_w; i++)
    {
        map[i] = [];
    }
    // random placement of snake food
    function rand_frog() 
    {
        var x, y;
        do 
        {
            x = MR() * rect_w|0;
            y = MR() * rect_h|0;
        } 
        while (map[x][y]);
        map[x][y] = 1;
        ctx.fillStyle = snake_color;
        ctx.strokeRect(x * 10+1, y * 10+1, 8, 8);
    }
    // Default somewhere placement 
    rand_frog();
    function set_game_speed() 
    {
        if (easy) 
        {
            X = (X+rect_w)%rect_w;
            Y = (Y+rect_h)%rect_h;
        }
        --inc_score;
        if (tn.length) 
        {
            dir = tn.pop();
            if ((dir % 2) !== (direction % 2)) 
            {
                direction = dir;
            }
        }
        if ((easy || (0 <= X && 0 <= Y && X < rect_w && Y < rect_h)) && 2 !== map[X][Y]) 
        {
            if (1 === map[X][Y]) 
            {
                score+= Math.max(5, inc_score);
                inc_score = 50;
                rand_frog();
                frog++;
            }
            //ctx.fillStyle("#ffffff");
            ctx.fillRect(X * 10, Y * 10, 9, 9);
            map[X][Y] = 2;
            queue.unshift([X, Y]);
            X+= x_dir[direction];
            Y+= y_dir[direction];
            if (frog < queue.length) 
            {
                dir = queue.pop()
                map[dir[0]][dir[1]] = 0;
                ctx.clearRect(dir[0] * 10, dir[1] * 10, 10, 10);
            }
        } 
        else if (!tn.length) 
        {
            var msg_score = document.getElementById("msg");
            msg_score.innerHTML = "Thank you for playing game.<br /> Your Score : <b>"+score+"</b><br /><br /><input type='button' value='Play Again' onclick='window.location.reload();' />";
            document.getElementById("playArea").style.display = 'none';
            window.clearInterval(interval);
        }
    }
    interval = window.setInterval(set_game_speed, level);
    document.onkeydown = function(e) 
    {
        var code = e.keyCode - 37;
        if (0 <= code && code < 4 && code !== tn[0]) 
        {
            tn.unshift(code);
        } 
        else if (-5 == code) 
        {
            if (interval) 
            {
                window.clearInterval(interval);
                interval = 0;
            } 
            else 
            {
                interval = window.setInterval(set_game_speed, 60);
            }
        }
        else 
        { 
            dir = sum + code;
            if (dir == 44||dir==94||dir==126||dir==171) 
            {
                sum+= code
            } else if (dir === 218) easy = 1;
        }
    }
}
</script>
<script>
$(document).on("click", ".upload", function () {
     var myId = $(this).data('id');
     $(".modal-body #id").val( myId );

});
</script>