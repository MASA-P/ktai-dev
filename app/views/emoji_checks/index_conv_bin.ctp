<?php
$Lib3gkEmoji = Lib3gkEmoji::get_instance();
$Lib3gkEmoji->_params['img_emoji_url'] = '/img/emoticons/';

$title = array(
	'encoding' => array(
		'UTF-8に切り替える', 
		'SJISに切り替える', 
	), 
	'binary' => array(
		'バイナリ絵文字にする', 
		'数値絵文字参照にする', 
	), 
	'convert' => array(
		'自動コンバートする', 
		'自動コンバートを解除する', 
	), 
);

echo $this->Html->link($title['encoding'][$encoding], array('encoding' => ($encoding ? 0 : 1), 'binary' => $binary, 'convert' => $convert));
echo "<br />\n";
echo $this->Html->link($title['binary'][$binary], array('encoding' => $encoding, 'binary' => ($binary ? 0 : 1), 'convert' => $convert));
echo "<br />\n";
echo $this->Html->link($title['convert'][$convert], array('encoding' => $encoding, 'binary' => $binary, 'convert' => ($convert ? 0 : 1)));
?>
<hr />
<table>
<tr>
<th>番号</th>

<th>img</th>
<th>出力</th>
</tr>

<tr>
<td>1</td>
<td><img src="/img/emoticons/sun.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>2</td>

<td><img src="/img/emoticons/cloud.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>3</td>
<td><img src="/img/emoticons/rain.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>4</td>

<td><img src="/img/emoticons/snow.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>5</td>
<td><img src="/img/emoticons/thunder.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>6</td>

<td><img src="/img/emoticons/typhoon.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>7</td>
<td><img src="/img/emoticons/mist.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>8</td>

<td><img src="/img/emoticons/sprinkle.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>9</td>
<td><img src="/img/emoticons/aries.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>10</td>

<td><img src="/img/emoticons/taurus.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>11</td>
<td><img src="/img/emoticons/gemini.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>12</td>

<td><img src="/img/emoticons/cancer.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>13</td>
<td><img src="/img/emoticons/leo.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>14</td>

<td><img src="/img/emoticons/virgo.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>15</td>
<td><img src="/img/emoticons/libra.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>16</td>

<td><img src="/img/emoticons/scorpius.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>17</td>
<td><img src="/img/emoticons/sagittarius.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>18</td>

<td><img src="/img/emoticons/capricornus.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>19</td>
<td><img src="/img/emoticons/aquarius.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>20</td>

<td><img src="/img/emoticons/pisces.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>21</td>
<td><img src="/img/emoticons/sports.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>22</td>

<td><img src="/img/emoticons/baseball.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>23</td>
<td><img src="/img/emoticons/golf.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>24</td>

<td><img src="/img/emoticons/tennis.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>25</td>
<td><img src="/img/emoticons/soccer.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>26</td>

<td><img src="/img/emoticons/ski.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>27</td>
<td><img src="/img/emoticons/basketball.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>28</td>

<td><img src="/img/emoticons/motorsports.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>29</td>
<td><img src="/img/emoticons/pocketbell.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>30</td>

<td><img src="/img/emoticons/train.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>31</td>
<td><img src="/img/emoticons/subway.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>32</td>

<td><img src="/img/emoticons/bullettrain.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>33</td>
<td><img src="/img/emoticons/car.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>34</td>

<td><img src="/img/emoticons/car.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>35</td>
<td><img src="/img/emoticons/bus.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>36</td>

<td><img src="/img/emoticons/ship.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>37</td>
<td><img src="/img/emoticons/airplane.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>38</td>

<td><img src="/img/emoticons/house.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>39</td>
<td><img src="/img/emoticons/building.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>40</td>

<td><img src="/img/emoticons/postoffice.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>41</td>
<td><img src="/img/emoticons/hospital.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>42</td>

<td><img src="/img/emoticons/bank.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>43</td>
<td><img src="/img/emoticons/atm.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>44</td>

<td><img src="/img/emoticons/hotel.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>45</td>
<td><img src="/img/emoticons/24hours.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>46</td>

<td><img src="/img/emoticons/gasstation.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>47</td>
<td><img src="/img/emoticons/parking.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>48</td>

<td><img src="/img/emoticons/signaler.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>49</td>
<td><img src="/img/emoticons/toilet.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>50</td>

<td><img src="/img/emoticons/restaurant.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>51</td>
<td><img src="/img/emoticons/cafe.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>52</td>

<td><img src="/img/emoticons/bar.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>53</td>
<td><img src="/img/emoticons/beer.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>54</td>

<td><img src="/img/emoticons/fastfood.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>55</td>
<td><img src="/img/emoticons/boutique.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>56</td>

<td><img src="/img/emoticons/hairsalon.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>57</td>
<td><img src="/img/emoticons/karaoke.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>58</td>

<td><img src="/img/emoticons/movie.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>59</td>
<td><img src="/img/emoticons/upwardright.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>60</td>

<td><img src="/img/emoticons/carouselpony.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>61</td>
<td><img src="/img/emoticons/music.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>62</td>

<td><img src="/img/emoticons/art.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>63</td>
<td><img src="/img/emoticons/drama.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>64</td>

<td><img src="/img/emoticons/event.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>65</td>
<td><img src="/img/emoticons/ticket.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>66</td>

<td><img src="/img/emoticons/smoking.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>67</td>
<td><img src="/img/emoticons/nosmoking.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>68</td>

<td><img src="/img/emoticons/camera.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>69</td>
<td><img src="/img/emoticons/bag.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>70</td>

<td><img src="/img/emoticons/book.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>71</td>
<td><img src="/img/emoticons/ribbon.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>72</td>

<td><img src="/img/emoticons/present.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>73</td>
<td><img src="/img/emoticons/birthday.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>74</td>

<td><img src="/img/emoticons/telephone.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>75</td>
<td><img src="/img/emoticons/mobilephone.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>76</td>

<td><img src="/img/emoticons/memo.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>77</td>
<td><img src="/img/emoticons/tv.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>78</td>

<td><img src="/img/emoticons/game.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>79</td>
<td><img src="/img/emoticons/cd.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>80</td>

<td><img src="/img/emoticons/heart.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>81</td>
<td><img src="/img/emoticons/spade.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>82</td>

<td><img src="/img/emoticons/diamond.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>83</td>
<td><img src="/img/emoticons/club.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>84</td>

<td><img src="/img/emoticons/eye.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>85</td>
<td><img src="/img/emoticons/ear.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>86</td>

<td><img src="/img/emoticons/rock.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>87</td>
<td><img src="/img/emoticons/scissors.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>88</td>

<td><img src="/img/emoticons/paper.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>89</td>
<td><img src="/img/emoticons/downwardright.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>90</td>

<td><img src="/img/emoticons/upwardleft.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>91</td>
<td><img src="/img/emoticons/foot.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>92</td>

<td><img src="/img/emoticons/shoe.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>93</td>
<td><img src="/img/emoticons/eyeglass.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>94</td>

<td><img src="/img/emoticons/wheelchair.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>95</td>
<td><img src="/img/emoticons/newmoon.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>96</td>

<td><img src="/img/emoticons/moon1.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>97</td>
<td><img src="/img/emoticons/moon2.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>98</td>

<td><img src="/img/emoticons/moon3.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>99</td>
<td><img src="/img/emoticons/fullmoon.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>100</td>

<td><img src="/img/emoticons/dog.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>101</td>
<td><img src="/img/emoticons/cat.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>102</td>

<td><img src="/img/emoticons/yacht.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>103</td>
<td><img src="/img/emoticons/xmas.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>104</td>

<td><img src="/img/emoticons/downwardleft.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>105</td>
<td><img src="/img/emoticons/phoneto.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>106</td>

<td><img src="/img/emoticons/mailto.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>107</td>
<td><img src="/img/emoticons/faxto.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>108</td>

<td><img src="/img/emoticons/info01.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>109</td>
<td><img src="/img/emoticons/info02.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>110</td>

<td><img src="/img/emoticons/mail.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>111</td>
<td><img src="/img/emoticons/by-d.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>112</td>

<td><img src="/img/emoticons/d-point.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>113</td>
<td><img src="/img/emoticons/yen.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>114</td>

<td><img src="/img/emoticons/free.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>115</td>
<td><img src="/img/emoticons/id.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>116</td>

<td><img src="/img/emoticons/key.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>117</td>
<td><img src="/img/emoticons/enter.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>118</td>

<td><img src="/img/emoticons/clear.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>119</td>
<td><img src="/img/emoticons/search.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>120</td>

<td><img src="/img/emoticons/new.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>121</td>
<td><img src="/img/emoticons/flag.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>122</td>

<td><img src="/img/emoticons/freedial.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>123</td>
<td><img src="/img/emoticons/sharp.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>124</td>

<td><img src="/img/emoticons/mobaq.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>125</td>
<td><img src="/img/emoticons/one.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>126</td>

<td><img src="/img/emoticons/two.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>127</td>
<td><img src="/img/emoticons/three.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>128</td>

<td><img src="/img/emoticons/four.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>129</td>
<td><img src="/img/emoticons/five.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>130</td>

<td><img src="/img/emoticons/six.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>131</td>
<td><img src="/img/emoticons/seven.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>132</td>

<td><img src="/img/emoticons/eight.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>133</td>
<td><img src="/img/emoticons/nine.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>134</td>

<td><img src="/img/emoticons/zero.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>135</td>
<td><img src="/img/emoticons/ok.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>136</td>

<td><img src="/img/emoticons/heart01.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>137</td>
<td><img src="/img/emoticons/heart02.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>138</td>

<td><img src="/img/emoticons/heart03.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>139</td>
<td><img src="/img/emoticons/heart04.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>140</td>

<td><img src="/img/emoticons/happy01.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>141</td>
<td><img src="/img/emoticons/angry.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>142</td>

<td><img src="/img/emoticons/despair.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>143</td>
<td><img src="/img/emoticons/sad.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>144</td>

<td><img src="/img/emoticons/wobbly.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>145</td>
<td><img src="/img/emoticons/up.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>146</td>

<td><img src="/img/emoticons/note.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>147</td>
<td><img src="/img/emoticons/spa.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>148</td>

<td><img src="/img/emoticons/cute.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>149</td>
<td><img src="/img/emoticons/kissmark.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>150</td>

<td><img src="/img/emoticons/shine.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>151</td>
<td><img src="/img/emoticons/flair.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>152</td>

<td><img src="/img/emoticons/annoy.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>153</td>
<td><img src="/img/emoticons/punch.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>154</td>

<td><img src="/img/emoticons/bomb.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>155</td>
<td><img src="/img/emoticons/notes.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>156</td>

<td><img src="/img/emoticons/down.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>157</td>
<td><img src="/img/emoticons/sleepy.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>158</td>

<td><img src="/img/emoticons/sign01.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>159</td>
<td><img src="/img/emoticons/sign02.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>160</td>

<td><img src="/img/emoticons/sign03.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>161</td>
<td><img src="/img/emoticons/impact.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>162</td>

<td><img src="/img/emoticons/sweat01.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>163</td>
<td><img src="/img/emoticons/sweat02.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>164</td>

<td><img src="/img/emoticons/dash.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>165</td>
<td><img src="/img/emoticons/sign04.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>166</td>

<td><img src="/img/emoticons/sign05.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>167</td>
<td><img src="/img/emoticons/slate.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>168</td>

<td><img src="/img/emoticons/pouch.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>169</td>
<td><img src="/img/emoticons/pen.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>170</td>

<td><img src="/img/emoticons/shadow.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>171</td>
<td><img src="/img/emoticons/chair.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>172</td>

<td><img src="/img/emoticons/night.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>173</td>
<td><img src="/img/emoticons/soon.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>174</td>

<td><img src="/img/emoticons/on.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>175</td>
<td><img src="/img/emoticons/end.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>176</td>

<td><img src="/img/emoticons/clock.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡1</td>
<td><img src="/img/emoticons/appli01.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡2</td>

<td><img src="/img/emoticons/appli02.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡3</td>
<td><img src="/img/emoticons/t-shirt.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡4</td>

<td><img src="/img/emoticons/moneybag.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡5</td>
<td><img src="/img/emoticons/rouge.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡6</td>

<td><img src="/img/emoticons/denim.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡7</td>
<td><img src="/img/emoticons/snowboard.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡8</td>

<td><img src="/img/emoticons/bell.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡9</td>
<td><img src="/img/emoticons/door.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡10</td>

<td><img src="/img/emoticons/dollar.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡11</td>
<td><img src="/img/emoticons/pc.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡12</td>

<td><img src="/img/emoticons/loveletter.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡13</td>
<td><img src="/img/emoticons/wrench.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡14</td>

<td><img src="/img/emoticons/pencil.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡15</td>
<td><img src="/img/emoticons/crown.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡16</td>

<td><img src="/img/emoticons/ring.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡17</td>
<td><img src="/img/emoticons/sandclock.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡18</td>

<td><img src="/img/emoticons/bicycle.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡19</td>
<td><img src="/img/emoticons/japanesetea.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡20</td>

<td><img src="/img/emoticons/watch.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡21</td>
<td><img src="/img/emoticons/think.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡22</td>

<td><img src="/img/emoticons/confident.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡23</td>
<td><img src="/img/emoticons/coldsweats01.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡24</td>

<td><img src="/img/emoticons/coldsweats02.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡25</td>
<td><img src="/img/emoticons/pout.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡26</td>

<td><img src="/img/emoticons/gawk.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡27</td>
<td><img src="/img/emoticons/lovely.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡28</td>

<td><img src="/img/emoticons/good.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡29</td>
<td><img src="/img/emoticons/bleah.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡30</td>

<td><img src="/img/emoticons/wink.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡31</td>
<td><img src="/img/emoticons/happy02.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡32</td>

<td><img src="/img/emoticons/bearing.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡33</td>
<td><img src="/img/emoticons/catface.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡34</td>

<td><img src="/img/emoticons/crying.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡35</td>
<td><img src="/img/emoticons/weep.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡36</td>

<td><img src="/img/emoticons/ng.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡37</td>
<td><img src="/img/emoticons/clip.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡38</td>

<td><img src="/img/emoticons/copyright.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡39</td>
<td><img src="/img/emoticons/tm.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡40</td>

<td><img src="/img/emoticons/run.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡41</td>
<td><img src="/img/emoticons/secret.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡42</td>

<td><img src="/img/emoticons/recycle.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡43</td>
<td><img src="/img/emoticons/r-mark.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡44</td>

<td><img src="/img/emoticons/danger.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡45</td>
<td><img src="/img/emoticons/ban.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡46</td>

<td><img src="/img/emoticons/empty.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡47</td>
<td><img src="/img/emoticons/pass.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡48</td>

<td><img src="/img/emoticons/full.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡49</td>
<td><img src="/img/emoticons/leftright.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡50</td>

<td><img src="/img/emoticons/updown.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡51</td>
<td><img src="/img/emoticons/school.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡52</td>

<td><img src="/img/emoticons/wave.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡53</td>
<td><img src="/img/emoticons/fuji.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡54</td>

<td><img src="/img/emoticons/clover.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡55</td>
<td><img src="/img/emoticons/cherry.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡56</td>

<td><img src="/img/emoticons/tulip.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡57</td>
<td><img src="/img/emoticons/banana.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡58</td>

<td><img src="/img/emoticons/apple.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡59</td>
<td><img src="/img/emoticons/bud.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡60</td>

<td><img src="/img/emoticons/maple.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡61</td>
<td><img src="/img/emoticons/cherryblossom.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡62</td>

<td><img src="/img/emoticons/riceball.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡63</td>
<td><img src="/img/emoticons/cake.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡64</td>

<td><img src="/img/emoticons/bottle.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡65</td>
<td><img src="/img/emoticons/noodle.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡66</td>

<td><img src="/img/emoticons/bread.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡67</td>
<td><img src="/img/emoticons/snail.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡68</td>

<td><img src="/img/emoticons/chick.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡69</td>
<td><img src="/img/emoticons/penguin.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡70</td>

<td><img src="/img/emoticons/fish.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡71</td>
<td><img src="/img/emoticons/delicious.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡72</td>

<td><img src="/img/emoticons/smile.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡73</td>
<td><img src="/img/emoticons/horse.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡74</td>

<td><img src="/img/emoticons/pig.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡75</td>
<td><img src="/img/emoticons/wine.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>


<tr>
<td>拡76</td>

<td><img src="/img/emoticons/shock.gif" border="0" width="16" height="16"></td>
<td></td>
</tr>

</table>
