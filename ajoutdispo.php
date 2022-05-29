<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    include 'header.php';
?>


<div class="wrapper">
    <div class="head">
        <h2>Ajout dispo</h2>
    </div>
    <section class="signup-form">
        
        <form class="signup" action="ajoutdispophp.php" method="post">
            <?php
            $doctoruserid = $_POST["id"];
            echo "<input type='hidden' name='id' value=".$doctoruserid.">";
            ?>
            <input type="time" name="deb" placeholder="Heure debut...">
            <input type="time" name="fin" placeholder="Heure fin...">
            <input type="date" name="date" placeholder="Date..."><br>
            <select id="salle" name="salle">
                <option value="EM_104">EM_104</option>
                <option value="EM_105">EM_105</option>
                <option value="EM_106">EM_106</option>
                <option value="EM_107">EM_107</option>
                <option value="EM_108">EM_108</option>
                <option value="EM_109">EM_109</option>
                <option value="EM_110">EM_110</option>
                <option value="EM_111">EM_111</option>
                <option value="EM_112">EM_112</option>
                <option value="EM_113">EM_113</option>
                <option value="EM_114">EM_114</option>
                <option value="EM_115">EM_115</option>
                <option value="EM_116">EM_116</option>
                <option value="EM_117">EM_117</option>
                <option value="EM_118">EM_118</option>
                <option value="EM_119">EM_119</option>
                <option value="EM_205">EM_205</option>
            </select><br><br>

            <button type="submit"name="submit">Submit</button>
        </form>
</section>
</div>


<?php
    include 'footer.php';
?>