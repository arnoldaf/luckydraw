@extends('layouts.member-out')

@section('title', 'Play Game')
<!-- Program Intro -->
@section('content')
    <div class="quote-icon"><img src="{!! asset('member/images/icon_logo2.png')!!}" alt="" /></div>
    <div class="parallax">
        <article class="">
            <div class="container">






                <section id="form-section">


                    <div id="managepoints">
                        <div class="jodi-section">
                            <div id="checkerStatus" class="checker__status"><h3> Manage Points:  <input type="radio"> GK Points  <input type="radio"> Multiplayer points  </h3>
                            </div>
                        </div>
                      
                        <div id="texas" class="two_third_contact lastcolumn">

                          <div class="clear"></div>


                                         <div id="tablewrapper" >
                                          <div id="tableheader">
                                                <div class="search">
                                                      <select id="columns" onchange="sorter.search('query')"></select>
                                                      <input type="text" id="query" onkeyup="sorter.search('query')" />
                                                  </div>
                                                  <span class="details">
                                              <div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
                                                  <div class="btn-reset"><a class="button blue" href="javascript:sorter.reset()">reset</a></div>
                                                </span>
                                              </div>
                                              <section>
                                              <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
                                                  <thead>
                                                      <tr>
                                                          <th class="nosort"><h3>ID</h3></th>
                                                          <th><h3>Tournamnet</h3></th>
                                                          <th><h3>Phone</h3></th>
                                                          <th><h3>Email</h3></th>
                                                          <th><h3>Buy-In</h3></th>
                                                          <th><h3>Time</h3></th>
                                                          <th><h3>Guarantee</h3></th>
                                                      </tr>
                                                  </thead>
                                                    <tbody>
                                                      <tr>
                                                          <td>1</td>
                                                          <td class="name">Ezekiel Hart</td>
                                                          <td>(627) 536-4760</td>
                                                          <td><a href="#" class="button-email" title="tortor@est.ca">tortor@est.ca</a></td>
                                                          <td>$1.10</td>
                                                          <td>March 26, 2009</td>
                                                          <td>$1,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>2</td>
                                                          <td>Jaquelyn Pace</td>
                                                          <td>(921) 943-5780</td>
                                                          <td><a href="#" class="button-email" title="in@elementum.org">in@elementum.org</a></td>
                                                          <td>$2.10</td>
                                                          <td>October 20, 2006</td>
                                                          <td>$2,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>3</td>
                                                          <td>Lois Pickett</td>
                                                          <td>(835) 361-5993</td>
                                                          <td><a href="#" class="button-email" title="arcu.ac@disse.ca">arcu.ac@disse.ca</a></td>
                                                          <td>$2.50</td>
                                                          <td>June 01, 1999</td>
                                                          <td>$6,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>4</td>
                                                          <td>Keane Raymond</td>
                                                          <td>(605) 803-1561</td>
                                                          <td><a href="#" class="button-email" title="at.Nunc@ipsum.com">at.Nunc@ipsum.com</a></td>
                                                          <td>$3.10</td>
                                                          <td>July 24, 1996</td>
                                                          <td>$3,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>5</td>
                                                          <td>Porter Thomas</td>
                                                          <td>(666) 569-9894</td>
                                                          <td><a href="#" class="button-email" title="non@Proin.ca">non@Proin.ca</a></td>
                                                          <td>$4.60</td>
                                                          <td>December 05, 2007</td>
                                                          <td>$11,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>6</td>
                                                          <td>Imani Murphy</td>
                                                          <td>(771) 294-6690</td>
                                                          <td><a href="#" class="button-email" title="Ae.sed@elit.ca">Ae.sed@elit.ca</a></td>
                                                          <td>$1.50</td>
                                                          <td>December 08, 1996</td>
                                                          <td>$20,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>7</td>
                                                          <td>Zachery Guthrie</td>
                                                          <td>(851) 784-4129</td>
                                                          <td><a href="#" class="button-email" title="nunulla@vel.com">nunulla@vel.com</a></td>
                                                          <td>$1.10</td>
                                                          <td>September 20, 2002</td>
                                                          <td>$6,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>8</td>
                                                          <td>Harper Bowen</td>
                                                          <td>(810) 652-6704</td>
                                                          <td><a href="#" class="button-email" title="dis@duinec.ca">dis@duinec.ca</a></td>
                                                          <td>$5.50</td>
                                                          <td>May 29, 1996</td>
                                                          <td>$8,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>9</td>
                                                          <td>Caldwell Larson</td>
                                                          <td>(850) 562-3177</td>
                                                          <td><a href="#" class="button-email" title="elit@dolor.com">elit@dolor.com</a></td>
                                                          <td>$1.10</td>
                                                          <td>June 22, 2004</td>
                                                          <td>$30,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>10</td>
                                                          <td>Baker Osborn</td>
                                                          <td>(378) 371-0559</td>
                                                          <td><a href="#" class="button-email" title="turpis.Nulla@ac.edu">turpis.Nulla@ac.edu</a></td>
                                                          <td>$2.00</td>
                                                          <td>July 23, 2005</td>
                                                          <td>$11,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>11</td>
                                                          <td>Yael Owens</td>
                                                          <td>(465) 520-1801</td>
                                                          <td><a href="#" class="button-email" title="nunc.tis@enim.com">nunc.tis@enim.com</a></td>
                                                          <td>$1.70</td>
                                                          <td>April 09, 1997</td>
                                                          <td>$10,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>12</td>
                                                          <td>Fletcher Briggs</td>
                                                          <td>(992) 962-9419</td>
                                                          <td><a href="#" class="button-email" title="amet.ante@lenque.edu">amet.ante@lenque.edu</a></td>
                                                          <td>$1.30</td>
                                                          <td>December 12, 2006</td>
                                                          <td>$5,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>13</td>
                                                          <td>Maggy Murphy</td>
                                                          <td>(585) 210-0390</td>
                                                          <td><a href="#" class="button-email" title="eu@Integer.com">eu@Integer.com</a></td>
                                                          <td>$2.20</td>
                                                          <td>April 02, 2007</td>
                                                          <td>$9,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>14</td>
                                                          <td>Maggie Blake</td>
                                                          <td>(489) 101-5447</td>
                                                          <td><a href="#" class="button-email" title="rutr.heeit@iacuis.org">rutr.heeit@iacuis.org</a></td>
                                                          <td>$2.60</td>
                                                          <td>May 24, 2008</td>
                                                          <td>$1,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>15</td>
                                                          <td>Ginger Bell</td>
                                                          <td>(934) 692-7294</td>
                                                          <td><a href="#" class="button-email" title="erat.in.tuer@pedut.org">erat.in.tuer@pedut.org</a></td>
                                                          <td>$1.10</td>
                                                          <td>April 13, 2003</td>
                                                          <td>$1,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>16</td>
                                                          <td>Iliana Ballard</td>
                                                          <td>(806) 835-7035</td>
                                                          <td><a href="#" class="button-email" title="vel.sapien@mi.ca">vel.sapien@mi.ca</a></td>
                                                          <td>$1.80</td>
                                                          <td>March 27, 1996</td>
                                                          <td>$2,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>17</td>
                                                          <td>Alisa Monroe</td>
                                                          <td>(859) 974-4442</td>
                                                          <td><a href="#" class="button-email" title="ading.lila@aram.edu">ading.lila@aram.edu</a></td>
                                                          <td>$3.60</td>
                                                          <td>April 30, 2003</td>
                                                          <td>$5,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>18</td>
                                                          <td>Kenyon Luna</td>
                                                          <td>(673) 147-0443</td>
                                                          <td><a href="#" class="button-email" title="Cras@Vestant.edu">Cras@Vestant.edu</a></td>
                                                          <td>$1.80</td>
                                                          <td>April 17, 2009</td>
                                                          <td>$1,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>19</td>
                                                          <td>Nola Kerr</td>
                                                          <td>(340) 430-0424</td>
                                                          <td><a href="#" class="button-email" title="tincnt@vurmagna.com">tincnt@vurmagna.com</a></td>
                                                          <td>$1.90</td>
                                                          <td>August 14, 2000</td>
                                                          <td>$15,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>20</td>
                                                          <td>Gail Cash</td>
                                                          <td>(291) 455-8520</td>
                                                          <td><a href="#" class="button-email" title="massa.rutum@Numlob.ca">massa.rutum@Numlob.ca</a></td>
                                                          <td>$3.80</td>
                                                          <td>April 27, 2002</td>
                                                          <td>$14,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>21</td>
                                                          <td>Kalia Ayala</td>
                                                          <td>(142) 520-1128</td>
                                                          <td><a href="#" class="button-email" title="Etiam.laet@velit.org">Etiam.laet@velit.org</a></td>
                                                          <td>$1.60</td>
                                                          <td>March 30, 2001</td>
                                                          <td>$16,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>22</td>
                                                          <td>Violet Ballard</td>
                                                          <td>(126) 374-6078</td>
                                                          <td><a href="#" class="button-email" title="Iner.gna@ntulis.edu">Iner.gna@ntulis.edu</a></td>
                                                          <td>$4.40</td>
                                                          <td>June 08, 2006</td>
                                                          <td>$21,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>23</td>
                                                          <td>Kevin Carrillo</td>
                                                          <td>(687) 483-9669</td>
                                                          <td><a href="#" class="button-email" title="in@adiscing.edu">in@adiscing.edu</a></td>
                                                          <td>$1.60</td>
                                                          <td>October 01, 2005</td>
                                                          <td>$31,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>24</td>
                                                          <td>Alexandra Nixon</td>
                                                          <td>(422) 644-3488</td>
                                                          <td><a href="#" class="button-email" title="nec.luctu@oriis.com">nec.luctu@oriis.com</a></td>
                                                          <td>$5.10</td>
                                                          <td>February 25, 2001</td>
                                                          <td>$7,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>25</td>
                                                          <td class="name" title="Charissa Manning">Charissa Manning</td>
                                                          <td>(438) 395-9392</td>
                                                          <td><a href="#" class="button-email" title="nib.vuate@necon.org">nib.vuate@necon.org</a></td>
                                                          <td>$4.50</td>
                                                          <td>April 02, 2005</td>
                                                          <td>$1,500</td>

                                                      </tr>
                                                      <tr>
                                                          <td>26</td>
                                                          <td>Noah Smith</td>
                                                          <td>(963) 652-2643</td>
                                                          <td><a href="#" class="button-email" title="Sed.neque@Duis.org">Sed.neque@Duis.org</a></td>
                                                          <td>$1.80</td>
                                                          <td>April 03, 2005</td>
                                                          <td>$15,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>27</td>
                                                          <td>Patience Battle</td>
                                                          <td>(294) 644-5306</td>
                                                          <td><a href="#" class="button-email" title="tempus.mau@eurus.com">tempus.mau@eurus.com</a></td>
                                                          <td>$2.10</td>
                                                          <td>October 19, 2003</td>
                                                          <td>$20,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>28</td>
                                                          <td>Kathleen Hudson</td>
                                                          <td>(190) 189-1420</td>
                                                          <td><a href="#" class="button-email" title="orci.quis@auctor.com">orci.quis@auctor.com</a></td>
                                                          <td>$3.30</td>
                                                          <td>January 03, 2004</td>
                                                          <td>$20,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>29</td>
                                                          <td>Marsden Bowman</td>
                                                          <td>(163) 780-6121</td>
                                                          <td><a href="#" class="button-email" title="maus.a@Sedit.edu">maus.a@Sedit.edu</a></td>
                                                          <td>$2.10</td>
                                                          <td>June 29, 2005</td>
                                                          <td>$20,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>30</td>
                                                          <td>Dorian Hodge</td>
                                                          <td>(304) 536-8850</td>
                                                          <td><a href="#" class="button-email" title="pelque@laoreet.org">pelque@laoreet.org</a></td>
                                                          <td>$1.10</td>
                                                          <td>February 21, 2007</td>
                                                          <td>$25,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>31</td>
                                                          <td>Levi Britt</td>
                                                          <td>(272) 171-5731</td>
                                                          <td><a href="#" class="button-email" title="felis@Dogiat.ca">felis@Dogiat.ca</a></td>
                                                          <td>$1.10</td>
                                                          <td>August 11, 2008</td>
                                                          <td>$25,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>32</td>
                                                          <td>Rana Blake</td>
                                                          <td>(608) 893-4909</td>
                                                          <td><a href="#" class="button-email" title="mala.fames@dui.edu">mala.fames@dui.edu</a></td>
                                                          <td>$1.70</td>
                                                          <td>February 13, 1997</td>
                                                          <td>$25,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>33</td>
                                                          <td>Helen Mccullough</td>
                                                          <td>(937) 368-5946</td>
                                                          <td><a href="#" class="button-email" title="socis.nue@mysum.org">socis.nue@mysum.org</a></td>
                                                          <td>$1.90</td>
                                                          <td>May 17, 2001</td>
                                                          <td>$25,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>34</td>
                                                          <td>Gil Ferguson</td>
                                                          <td>(832) 581-6953</td>
                                                          <td><a href="#" class="button-email" title="libero@Infbus.com">libero@Infbus.com</a></td>
                                                          <td>$6.10</td>
                                                          <td>March 22, 1996</td>
                                                          <td>$25,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>35</td>
                                                          <td>Judah Manning</td>
                                                          <td>(332) 888-8768</td>
                                                          <td><a href="#" class="button-email" title="congue@Nuncut.com">congue@Nuncut.com</a></td>
                                                          <td>$1.10</td>
                                                          <td>December 14, 2009</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>36</td>
                                                          <td>Yoshi Humphrey</td>
                                                          <td>(961) 215-0426</td>
                                                          <td><a href="#" class="button-email" title="phatra@rutrce.edu">phatra@rutrce.edu</a></td>
                                                          <td>$3.10</td>
                                                          <td>August 24, 1997</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>37</td>
                                                          <td>Idona Williams</td>
                                                          <td>(163) 580-2609</td>
                                                          <td><a href="#" class="button-email" title="Intr.auam@Seero.org">Intr.auam@Seero.org</a></td>
                                                          <td>$1.10</td>
                                                          <td>February 22, 2000</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>38</td>
                                                          <td>Petra Bennett</td>
                                                          <td>(976) 799-4111</td>
                                                          <td><a href="#" class="button-email" title="Proin@Doentum.org">Proin@Doentum.org</a></td>
                                                          <td>$2.20</td>
                                                          <td>April 27, 1999</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>39</td>
                                                          <td>Phyllis Rogers</td>
                                                          <td>(798) 959-3321</td>
                                                          <td><a href="#" class="button-email" title="eget.dtt@iibero.ca">eget.dtt@iibero.ca</a></td>
                                                          <td>$1.10</td>
                                                          <td>February 14, 2009</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>40</td>
                                                          <td>Fritz Benton</td>
                                                          <td>(525) 353-2984</td>
                                                          <td><a href="#" class="button-email" title="a@diamnunc.com">a@diamnunc.com</a></td>
                                                          <td>$1.10</td>
                                                          <td>June 16, 2002</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>41</td>
                                                          <td>Mannix Davidson</td>
                                                          <td>(106) 260-1651</td>
                                                          <td><a href="#" class="button-email" title="punar@Duisvt.org">punar@Duisvt.org</a></td>
                                                          <td>$1.80</td>
                                                          <td>October 24, 2002</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>42</td>
                                                          <td>Grant Lawrence</td>
                                                          <td>(807) 487-5786</td>
                                                          <td><a href="#" class="button-email" title="a@interdbero.ca">a@interdbero.ca</a></td>
                                                          <td>$4.70</td>
                                                          <td>March 28, 2007</td>
                                                          <td>$35,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>43</td>
                                                          <td>Laurel Ortiz</td>
                                                          <td>(945) 481-7808</td>
                                                          <td><a href="#" class="button-email" title="laot.puere@vais.com">laot.puere@vais.com</a></td>
                                                          <td>$2.20</td>
                                                          <td>May 11, 2006</td>
                                                          <td>$55,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>44</td>
                                                          <td>Lewis Frank</td>
                                                          <td>(844) 314-8683</td>
                                                          <td><a href="#" class="button-email" title="fames@graida.edu">fames@graida.edu</a></td>
                                                          <td>$2.20</td>
                                                          <td>January 25, 1998</td>
                                                          <td>$55,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>45</td>
                                                          <td>Yasir Knox</td>
                                                          <td>(814) 509-0367</td>
                                                          <td><a href="#" class="button-email" title="Cras.ve.velit@asUt.com">Cras.ve.vit@asUt.com</a></td>
                                                          <td>$2.20</td>
                                                          <td>August 20, 2007</td>
                                                          <td>$55,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>46</td>
                                                          <td>Palmer Newman</td>
                                                          <td>(955) 748-1014</td>
                                                          <td><a href="#" class="button-email" title="fringilla@id.edu">fringilla@id.edu</a></td>
                                                          <td>$3.20</td>
                                                          <td>December 28, 2007</td>
                                                          <td>$5,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>47</td>
                                                          <td>Tate Webster</td>
                                                          <td>(107) 247-3380</td>
                                                          <td><a href="#" class="button-email" title="pelleue@pedeultri.com">pelleue@pedeultri.com</a></td>
                                                          <td>$3.20</td>
                                                          <td>August 11, 2005</td>
                                                          <td>$5,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>48</td>
                                                          <td>Charity Hahn</td>
                                                          <td>(395) 200-9188</td>
                                                          <td><a href="#" class="button-email" title="ac@Quisque.edu">ac@Quisque.edu</a></td>
                                                          <td>$3.50</td>
                                                          <td>January 17, 2009</td>
                                                          <td>$5,000</td>

                                                      </tr>
                                                      <tr>
                                                          <td>49</td>
                                                          <td>Katell Crosby</td>
                                                          <td>(259) 659-7498</td>
                                                          <td><a href="#" class="button-email" title="tinunt.vla@ura.com">tinunt.vla@ura.com</a></td>
                                                          <td>$2.20</td>
                                                          <td>January 02, 2007</td>
                                                          <td>$7,000</td>

                                                      </tr>
                                                  </tbody>
                                              </table>
                                              </section>
                                              <div id="tablefooter">
                                                <div id="tablenav">
                                                    <div>
                                                          <img src="images/tabsresp/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                                                          <img src="images/tabsresp/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                                                          <img src="images/tabsresp/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                                                          <img src="images/tabsresp/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                                                      </div>
                                                      <div>
                                                        <select  id="pagedropdown"></select>
                                              </div>
                                                      <div class="btn-reset"><a class="button blue" href="javascript:sorter.showall()">view all</a>
                                                      </div>
                                                  </div>
                                            <div id="tablelocation">
                                                  <div>
                                                        <select onchange="sorter.size(this.value)">
                                                          <option value="5">5</option>
                                                              <option value="10" selected="selected">10</option>
                                                              <option value="20">20</option>
                                                              <option value="50">50</option>
                                                              <option value="100">100</option>
                                                          </select>
                                                      </div>
                                                      <div class="page txt-txt">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
                                                  </div>
                                              </div>
                                          </div>
                                                <div class="clear"></div>




                                    </div>



                    </div>
                </section>


            </div>
        </article>
    </div>
@endsection
<style>
    .alert { height: 20px; padding: 5px; color: #fff;}
    .alert-danger {background-color: #d4202b}
    .alert-success {background-color: #00ff00}
</style>
