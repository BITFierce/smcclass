var subcat = new Array();
  subcat[0] = new Array('1','���Ｐ�����������ֲ') 
  subcat[1] = new Array('1','��ҩ�ĵ���ֲ')
  subcat[2] = new Array('1','��ľ����������ֲ')
  subcat[3] = new Array('1','ľ�ĺ���ĵĲ���')
  subcat[4] = new Array('1','�ֲ�Ʒ�Ĳɼ�')
  subcat[5] = new Array('1','���������')
  subcat[6] = new Array('1','���ݵ�����')
  subcat[7] = new Array('1','ũҵ����ҵ')
  subcat[8] = new Array('1','��ҵ����ҵ')
  subcat[9] = new Array('1','��ҵ����ҵ')
  subcat[10] = new Array('2','��ú������ú�Ŀ���')
  subcat[11] = new Array('2','��Ȼԭ�ͺ���Ȼ������')
  subcat[12] = new Array('2','�����ѡ')
  subcat[13] = new Array('2','������ɫ�������ѡ')
  subcat[14] = new Array('2','�������ѡ')
  subcat[15] = new Array('2','��ɰʯ����')
  subcat[16] = new Array('2','����')
  subcat[17] = new Array('3','����ĥ��')
  subcat[18] = new Array('3','���ϼӹ�')
  subcat[19] = new Array('3','ֲ���ͼӹ�')
  subcat[20] = new Array('3','ˮ��Ʒ�ӹ�')
  subcat[21] = new Array('3','�߲ˣ�ˮ���ͼ���ӹ�')
  subcat[22] = new Array('3','����ʳƷ����')
  subcat[23] = new Array('3','��ͷ����')
  subcat[24] = new Array('3','�ƾ�����')
  subcat[25] = new Array('4','��������')
  subcat[26] = new Array('4','������Ӧ')
  subcat[27] = new Array('4','���������͹�Ӧ')
  subcat[28] = new Array('4','ȼ�������͹�Ӧ')
  subcat[29] = new Array('4','����ˮ�����͹�Ӧ')
  subcat[30] = new Array('4','��ˮ������������')
  subcat[31] = new Array('5','���ݹ��̽���')
  subcat[32] = new Array('5','��ľ���̽���')
  subcat[33] = new Array('5','������װҵ')
  subcat[34] = new Array('5','����װ��ҵ')
  subcat[35] = new Array('5','����׼��')
  subcat[36] = new Array('5','�ṩʩ���豸����')
  function changeselect(selectValue) 
  {
    document.table.s2.length = 0;//��ʼ�������б� �����������
 for (i=0; i<subcat.length; i++)//legth=2
 {
   if (subcat[i][0] == selectValue)//[0] [1] ��һ�� �ڶ��� 
   {
     document.table.s2.options[document.table.s2.length] = new Option(subcat[i][1], subcat[i][2]);
   }
 }
  }