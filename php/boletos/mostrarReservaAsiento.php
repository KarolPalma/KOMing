<?php
    include("../../php/conexion.php");
?>

<table class="autobus">
    <?php
        $numViaje = $_POST['numeroViaje'];
        $sql = "SELECT Numero_Asiento FROM Boletos WHERE Id_Viaje = " . $numViaje;
        $result = mysqli_query($conexion, $sql);
        
        echo "
                                
            <tr>
                <td ><button onClick='return reservaDisponible(4)' name='4' id='4' value='vacio' class='disponible'>4</button></td>
                <td ><button onClick='return reservaDisponible(8)' name='8' id='8' value='vacio' class='disponible'>8</button></td>
                <td ><button onClick='return reservaDisponible(12)' name='12' id='12' value='vacio' class='disponible'>12</button></td>
                <td ><button onClick='return reservaDisponible(16)' name='16' id='16' value='vacio' class='disponible'>16</button></td>
                <td ><button onClick='return reservaDisponible(20)' name='20' id='20' value='vacio' class='disponible'>20</button></td>
                <td ><button onClick='return reservaDisponible(24)' name='24' id='24' value='vacio' class='disponible'>24</button></td>
                <td ><button onClick='return reservaDisponible(28)' name='28' id='28' value='vacio' class='disponible'>28</button></td>
                <td ><button onClick='return reservaDisponible(32)' name='32' id='32' value='vacio' class='disponible'>32</button></td>
                <td ><button onClick='return reservaDisponible(36)' name='36' id='36' value='vacio' class='disponible'>36</button></td>
                <td ><button onClick='return reservaDisponible(40)' name='40' id='40' value='vacio' class='disponible'>40</button></td>
                <td ><button onClick='return reservaDisponible(44)' name='44' id='44' value='vacio' class='disponible'>44</button></td>
                <td ><button onClick='return reservaDisponible(48)' name='48' id='48' value='vacio' class='disponible'>48</button></td>
                <td ><button onClick='return reservaDisponible(52)' name='52' id='52' value='vacio' class='disponible'>52</button></td>
            </tr>
            <tr>
                <td><button onClick='return reservaDisponible(3)' name='3' id='3' value='vacio' class='disponible'>3</button></td>
                <td><button onClick='return reservaDisponible(7)' name='7' id='7' value='vacio' class='disponible'>7</button></td>
                <td ><button onClick='return reservaDisponible(11)' name='11' id='11' value='vacio' class='disponible'>11</button></td>
                <td ><button onClick='return reservaDisponible(15)' name='15' id='15' value='vacio' class='disponible'>15</button></td>
                <td ><button onClick='return reservaDisponible(19)' name='19' id='19' value='vacio' class='disponible'>19</button></td>
                <td ><button onClick='return reservaDisponible(23)' name='23' id='23' value='vacio' class='disponible'>23</button></td>
                <td ><button onClick='return reservaDisponible(27)' name='27' id='27' value='vacio' class='disponible'>27</button></td>
                <td ><button onClick='return reservaDisponible(31)' name='31' id='31' value='vacio' class='disponible'>31</button></td>
                <td ><button onClick='return reservaDisponible(35)' name='35' id='35' value='vacio' class='disponible'>35</button></td>
                <td ><button onClick='return reservaDisponible(39)' name='39' id='39' value='vacio' class='disponible'>39</button></td>
                <td ><button onClick='return reservaDisponible(43)' name='43' id='43' value='vacio' class='disponible'>43</button></td>
                <td ><button onClick='return reservaDisponible(47)' name='47' id='47' value='vacio' class='disponible'>47</button></td>
                <td ><button onClick='return reservaDisponible(51)' name='51' id='51' value='vacio' class='disponible'>51</button></td>
            </tr>
            <tr>
                    <td style='padding-bottom: 30px;'>&nbsp;</td>
            </tr>
            <tr>
                <td><button onClick='return reservaDisponible(2)' name='2' id='2' value='vacio' class='disponible'>2</button></td>
                <td><button onClick='return reservaDisponible(6)' name='6' id='6' value='vacio' class='disponible'>6</button></td>
                <td ><button onClick='return reservaDisponible(10)' name='10' id='10' value='vacio' class='disponible'>10</button></td>
                <td ><button onClick='return reservaDisponible(14)' name='14' id='14' value='vacio' class='disponible'>14</button></td>
                <td ><button onClick='return reservaDisponible(18)' name='18' id='18' value='vacio' class='disponible'>18</button></td>
                <td ><button onClick='return reservaDisponible(22)' name='22' id='22' value='vacio' class='disponible'>22</button></td>
                <td ><button onClick='return reservaDisponible(26)' name='26' id='26' value='vacio' class='disponible'>26</button></td>
                <td ><button onClick='return reservaDisponible(30)' name='30' id='30' value='vacio' class='disponible'>30</button></td>
                <td ><button onClick='return reservaDisponible(34)' name='34' id='34' value='vacio' class='disponible'>34</button></td>
                <td ><button onClick='return reservaDisponible(38)' name='38' id='38' value='vacio' class='disponible'>38</button></td>
                <td ><button onClick='return reservaDisponible(42)' name='42' id='42' value='vacio' class='disponible'>42</button></td>
                <td ><button onClick='return reservaDisponible(46)' name='46' id='46' value='vacio' class='disponible'>46</button></td>
                <td ><button onClick='return reservaDisponible(50)' name='50' id='50' value='vacio' class='disponible'>50</button></td>
                <td ><button onClick='return reservaDisponible(54)' name='54' id='54' value='vacio' class='disponible'>54</button></td>
            </tr>
            <tr>
                <td><button onClick='return reservaDisponible(1)' name='1' id='1' value='vacio' class='disponible'>1</button></td>
                <td><button onClick='return reservaDisponible(5)' name='5' id='5' value='vacio' class='disponible'>5</button></td>
                <td ><button onClick='return reservaDisponible(9)' name='9' id='9' value='vacio' class='disponible'>9</button></td>
                <td ><button onClick='return reservaDisponible(13)' name='13' id='13' value='vacio' class='disponible'>13</button></td>
                <td ><button onClick='return reservaDisponible(17)' name='17' id='17' value='vacio' class='disponible'>17</button></td>
                <td ><button onClick='return reservaDisponible(21)' name='21' id='21' value='vacio' class='disponible'>21</button></td>
                <td ><button onClick='return reservaDisponible(25)' name='25' id='25' value='vacio' class='disponible'>25</button></td>
                <td ><button onClick='return reservaDisponible(29)' name='29' id='29' value='vacio' class='disponible'>29</button></td>
                <td ><button onClick='return reservaDisponible(33)' name='33' id='33' value='vacio' class='disponible'>33</button></td>
                <td ><button onClick='return reservaDisponible(37)' name='37' id='37' value='vacio' class='disponible'>37</button></td>
                <td ><button onClick='return reservaDisponible(41)' name='41' id='41' value='vacio' class='disponible'>41</button></td>
                <td ><button onClick='return reservaDisponible(45)' name='45' id='45' value='vacio' class='disponible'>45</button></td>
                <td ><button onClick='return reservaDisponible(49)' name='49' id='49' value='vacio' class='disponible'>49</button></td>
                <td ><button onClick='return reservaDisponible(53)' name='53' id='53' value='vacio' class='disponible'>53</button></td>
            </tr>
        ";
        while ($row = mysqli_fetch_assoc($result))
        {           
            if($row['Numero_Asiento']){
                echo "<script>
                        document.getElementById(".$row['Numero_Asiento'].").value = 'noDisponible'
                        document.getElementById(".$row['Numero_Asiento'].").className = 'ocupado';
                    </script>
                ";
            }
        }
    ?>
</table>