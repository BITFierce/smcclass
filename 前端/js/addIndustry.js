var subcat = new Array();
  subcat[0] = new Array('1','谷物及其他作物的种植') 
  subcat[1] = new Array('1','中药材的种植')
  subcat[2] = new Array('1','林木的培育和种植')
  subcat[3] = new Array('1','木材和竹材的采运')
  subcat[4] = new Array('1','林产品的采集')
  subcat[5] = new Array('1','牲畜的饲养')
  subcat[6] = new Array('1','家禽的饲养')
  subcat[7] = new Array('1','农业服务业')
  subcat[8] = new Array('1','林业服务业')
  subcat[9] = new Array('1','渔业服务业')
  subcat[10] = new Array('2','烟煤和无烟煤的开采')
  subcat[11] = new Array('2','天然原油和天然气开采')
  subcat[12] = new Array('2','铁矿采选')
  subcat[13] = new Array('2','常用有色金属矿采选')
  subcat[14] = new Array('2','贵金属采选')
  subcat[15] = new Array('2','土砂石开采')
  subcat[16] = new Array('2','采盐')
  subcat[17] = new Array('3','谷物磨制')
  subcat[18] = new Array('3','饲料加工')
  subcat[19] = new Array('3','植物油加工')
  subcat[20] = new Array('3','水产品加工')
  subcat[21] = new Array('3','蔬菜，水果和坚果加工')
  subcat[22] = new Array('3','方便食品制造')
  subcat[23] = new Array('3','罐头制造')
  subcat[24] = new Array('3','酒精制造')
  subcat[25] = new Array('4','电力生产')
  subcat[26] = new Array('4','电力供应')
  subcat[27] = new Array('4','热力生产和供应')
  subcat[28] = new Array('4','燃气生产和供应')
  subcat[29] = new Array('4','自来水生产和供应')
  subcat[30] = new Array('4','污水处理及再生利用')
  subcat[31] = new Array('5','房屋工程建筑')
  subcat[32] = new Array('5','土木工程建筑')
  subcat[33] = new Array('5','建筑安装业')
  subcat[34] = new Array('5','建筑装饰业')
  subcat[35] = new Array('5','工程准备')
  subcat[36] = new Array('5','提供施工设备服务')
  function changeselect(selectValue) 
  {
    document.table.s2.length = 0;//初始化下拉列表 清空下拉数据
 for (i=0; i<subcat.length; i++)//legth=2
 {
   if (subcat[i][0] == selectValue)//[0] [1] 第一列 第二列 
   {
     document.table.s2.options[document.table.s2.length] = new Option(subcat[i][1], subcat[i][2]);
   }
 }
  }