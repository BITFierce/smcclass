var addressInit = function(_cmbProvince, _cmbCity, _cmbArea, defaultProvince, defaultCity, defaultArea)
{
    var cmbProvince = document.getElementById(_cmbProvince);
    var cmbCity = document.getElementById(_cmbCity);
    var cmbArea = document.getElementById(_cmbArea);
     
    function cmbSelect(cmb, str)
    {
        for(var i=0; i<cmb.options.length; i++)
        {
            if(cmb.options[i].value == str)
            {
                cmb.selectedIndex = i;
                return;
            }
        }
    }
    function cmbAddOption(cmb, str, obj)
    {
        var option = document.createElement("OPTION");
        cmb.options.add(option);
        option.innerHTML = str;
        option.value = str;
        option.obj = obj;
    }
     
    function changeCity()
    {
        cmbArea.options.length = 0;
        if(cmbCity.selectedIndex == -1)return;
        var item = cmbCity.options[cmbCity.selectedIndex].obj;
        for(var i=0; i<item.areaList.length; i++)
        {
            cmbAddOption(cmbArea, item.areaList[i], null);
        }
        cmbSelect(cmbArea, defaultArea);
    }
    function changeProvince()
    {
        cmbCity.options.length = 0;
        cmbCity.onchange = null;
        if(cmbProvince.selectedIndex == -1)return;
        var item = cmbProvince.options[cmbProvince.selectedIndex].obj;
        for(var i=0; i<item.cityList.length; i++)
        {
            cmbAddOption(cmbCity, item.cityList[i].name, item.cityList[i]);
        }
        cmbSelect(cmbCity, defaultCity);
        changeCity();
        cmbCity.onchange = changeCity;
    }
     
    for(var i=0; i<provinceList.length; i++)
    {
        cmbAddOption(cmbProvince, provinceList[i].name, provinceList[i]);
    }
    cmbSelect(cmbProvince, defaultProvince);
    changeProvince();
    cmbProvince.onchange = changeProvince;
}
 
var provinceList = [
{name:'济南市', cityList:[         
{name:'市中区', areaList:['东区','西区','南区','北区']},
{name:'历下区', areaList:['东区','西区','南区','北区']},
{name:'天桥区', areaList:['东区','西区','南区','北区']},
{name:'槐荫区', areaList:['东区','西区','南区','北区']},
{name:'历城区', areaList:['东区','西区','南区','北区']},
{name:'长清区', areaList:['东区','西区','南区','北区']},
{name:'章丘市', areaList:['东区','西区','南区','北区']},
{name:'济阳县', areaList:['东区','西区','南区','北区']},
{name:'平阴县', areaList:['东区','西区','南区','北区']},
{name:'商河县', areaList:['东区','西区','南区','北区']}
]},
{name:'青岛市', cityList:[         
{name:'市南区', areaList:['东区','西区','南区','北区']},
{name:'市北区', areaList:['东区','西区','南区','北区']},
{name:'城阳区', areaList:['东区','西区','南区','北区']},
{name:'四方区', areaList:['东区','西区','南区','北区']},
{name:'李沧区', areaList:['东区','西区','南区','北区']},
{name:'黄岛区', areaList:['东区','西区','南区','北区']},
{name:'崂山区', areaList:['东区','西区','南区','北区']},
{name:'胶南市', areaList:['东区','西区','南区','北区']},
{name:'胶州市', areaList:['东区','西区','南区','北区']},
{name:'平度市', areaList:['东区','西区','南区','北区']},
{name:'莱西市', areaList:['东区','西区','南区','北区']},
{name:'即墨市', areaList:['东区','西区','南区','北区']}
]},
{name:'淄博市', cityList:[         
{name:'张店区', areaList:['东区','西区','南区','北区']},
{name:'临淄区', areaList:['东区','西区','南区','北区']},
{name:'淄川区', areaList:['东区','西区','南区','北区']},
{name:'博山区', areaList:['东区','西区','南区','北区']},
{name:'周村区', areaList:['东区','西区','南区','北区']},
{name:'黄岛区', areaList:['东区','西区','南区','北区']},
{name:'桓台县', areaList:['东区','西区','南区','北区']},
{name:'高青县', areaList:['东区','西区','南区','北区']},
{name:'沂源县', areaList:['东区','西区','南区','北区']}
]},                                                  
{name:'德州市', cityList:[         
{name:'德城区', areaList:['东区','西区','南区','北区']},
{name:'乐陵市', areaList:['东区','西区','南区','北区']},
{name:'禹城市', areaList:['东区','西区','南区','北区']},
{name:'陵县', areaList:['东区','西区','南区','北区']},
{name:'宁津县', areaList:['东区','西区','南区','北区']},
{name:'黄岛区', areaList:['东区','西区','南区','北区']},
{name:'武城县', areaList:['东区','西区','南区','北区']},
{name:'庆云县', areaList:['东区','西区','南区','北区']},
{name:'平原县', areaList:['东区','西区','南区','北区']},
{name:'夏津县', areaList:['东区','西区','南区','北区']},
{name:'临邑县', areaList:['东区','西区','南区','北区']}
]},
{name:'烟台市', cityList:[         
{name:'芝罘区', areaList:['东区','西区','南区','北区']},
{name:'福山区', areaList:['东区','西区','南区','北区']},
{name:'牟平区', areaList:['东区','西区','南区','北区']},
{name:'莱山区', areaList:['东区','西区','南区','北区']},
{name:'龙口市', areaList:['东区','西区','南区','北区']},
{name:'莱阳市', areaList:['东区','西区','南区','北区']},
{name:'莱州市', areaList:['东区','西区','南区','北区']},
{name:'招远市', areaList:['东区','西区','南区','北区']},
{name:'蓬莱市', areaList:['东区','西区','南区','北区']},
{name:'栖霞市', areaList:['东区','西区','南区','北区']},
{name:'海阳市', areaList:['东区','西区','南区','北区']},
{name:'长岛县', areaList:['东区','西区','南区','北区']}
]},
{name:'潍坊市', cityList:[         
{name:'潍城区', areaList:['东区','西区','南区','北区']},
{name:'寒亭区', areaList:['东区','西区','南区','北区']},
{name:'坊子区', areaList:['东区','西区','南区','北区']},
{name:'奎文区', areaList:['东区','西区','南区','北区']},
{name:'青州市', areaList:['东区','西区','南区','北区']},
{name:'诸城市', areaList:['东区','西区','南区','北区']},
{name:'寿光市', areaList:['东区','西区','南区','北区']},
{name:'安丘市', areaList:['东区','西区','南区','北区']},
{name:'高密市', areaList:['东区','西区','南区','北区']},
{name:'昌邑市', areaList:['东区','西区','南区','北区']},
{name:'昌乐县', areaList:['东区','西区','南区','北区']},
{name:'临朐县', areaList:['东区','西区','南区','北区']}
]},
{name:'济宁市', cityList:[         
{name:'市中区', areaList:['东区','西区','南区','北区']},
{name:'任城区', areaList:['东区','西区','南区','北区']},
{name:'曲阜市', areaList:['东区','西区','南区','北区']},
{name:'兖州市', areaList:['东区','西区','南区','北区']},
{name:'邹城市', areaList:['东区','西区','南区','北区']},
{name:'鱼台县', areaList:['东区','西区','南区','北区']},
{name:'金乡县', areaList:['东区','西区','南区','北区']},
{name:'嘉祥县', areaList:['东区','西区','南区','北区']},
{name:'微山县', areaList:['东区','西区','南区','北区']},
{name:'汶上县', areaList:['东区','西区','南区','北区']},
{name:'泗水县', areaList:['东区','西区','南区','北区']},
{name:'梁山县', areaList:['东区','西区','南区','北区']}
]},
{name:'泰安市', cityList:[         
{name:'泰山区', areaList:['东区','西区','南区','北区']},
{name:'岱岳区', areaList:['东区','西区','南区','北区']},
{name:'新泰市', areaList:['东区','西区','南区','北区']},
{name:'肥城市', areaList:['东区','西区','南区','北区']},
{name:'宁阳县', areaList:['东区','西区','南区','北区']},
{name:'东平县', areaList:['东区','西区','南区','北区']}
]},                                                  
{name:'临沂市', cityList:[                           
{name:'兰山区', areaList:['东区','西区','南区','北区']},
{name:'罗庄区', areaList:['东区','西区','南区','北区']},
{name:'河东区', areaList:['东区','西区','南区','北区']},
{name:'沂南县', areaList:['东区','西区','南区','北区']},
{name:'郯城县', areaList:['东区','西区','南区','北区']},
{name:'沂水县', areaList:['东区','西区','南区','北区']},
{name:'苍山县', areaList:['东区','西区','南区','北区']},
{name:'费县', areaList:['东区','西区','南区','北区']},
{name:'平邑县', areaList:['东区','西区','南区','北区']},
{name:'莒南县', areaList:['东区','西区','南区','北区']},
{name:'蒙阴县', areaList:['东区','西区','南区','北区']},
{name:'临沭县', areaList:['东区','西区','南区','北区']}
]},
{name:'菏泽市', cityList:[         
{name:'牡丹区', areaList:['东区','西区','南区','北区']},
{name:'鄄城县', areaList:['东区','西区','南区','北区']},
{name:'单县', areaList:['东区','西区','南区','北区']},
{name:'郓城县', areaList:['东区','西区','南区','北区']},
{name:'曹县', areaList:['东区','西区','南区','北区']},
{name:'定陶县', areaList:['东区','西区','南区','北区']},
{name:'巨野县', areaList:['东区','西区','南区','北区']},
{name:'东明县', areaList:['东区','西区','南区','北区']},
{name:'成武县', areaList:['东区','西区','南区','北区']}
]},
{name:'滨州市', cityList:[         
{name:'滨城区', areaList:['东区','西区','南区','北区']},
{name:'邹平县', areaList:['东区','西区','南区','北区']},
{name:'沾化县', areaList:['东区','西区','南区','北区']},
{name:'惠民县', areaList:['东区','西区','南区','北区']},
{name:'博兴县', areaList:['东区','西区','南区','北区']},
{name:'阳信县', areaList:['东区','西区','南区','北区']},
{name:'无棣县', areaList:['东区','西区','南区','北区']},
{name:'费县', areaList:['东区','西区','南区','北区']},
{name:'平邑县', areaList:['东区','西区','南区','北区']},
{name:'莒南县', areaList:['东区','西区','南区','北区']},
{name:'蒙阴县', areaList:['东区','西区','南区','北区']},
{name:'临沭县', areaList:['东区','西区','南区','北区']}
]},
{name:'东营市', cityList:[         
{name:'东营区', areaList:['东区','西区','南区','北区']},
{name:'河口区', areaList:['东区','西区','南区','北区']},
{name:'垦利县', areaList:['东区','西区','南区','北区']},
{name:'广饶县', areaList:['东区','西区','南区','北区']},
{name:'利津县', areaList:['东区','西区','南区','北区']}
]},
{name:'威海市', cityList:[         
{name:'环翠区', areaList:['东区','西区','南区','北区']},
{name:'乳山市', areaList:['东区','西区','南区','北区']},
{name:'文登市', areaList:['东区','西区','南区','北区']},
{name:'荣成市', areaList:['东区','西区','南区','北区']}
]},
{name:'枣庄市', cityList:[         
{name:'市中区', areaList:['东区','西区','南区','北区']},
{name:'山亭区', areaList:['东区','西区','南区','北区']},
{name:'峄城区', areaList:['东区','西区','南区','北区']},
{name:'台儿庄区', areaList:['东区','西区','南区','北区']},
{name:'薛城区', areaList:['东区','西区','南区','北区']},
{name:'滕州市', areaList:['东区','西区','南区','北区']}
]},
{name:'日照市', cityList:[         
{name:'东港区', areaList:['东区','西区','南区','北区']},
{name:'岚山区', areaList:['东区','西区','南区','北区']},
{name:'五莲县', areaList:['东区','西区','南区','北区']},
{name:'莒县', areaList:['东区','西区','南区','北区']}
]},
{name:'莱芜市', cityList:[         
{name:'莱城区', areaList:['东区','西区','南区','北区']},
{name:'钢城区', areaList:['东区','西区','南区','北区']}
]}, 
{name:'聊城市', cityList:[         
{name:'东昌府区', areaList:['东区','西区','南区','北区']},
{name:'临清市', areaList:['东区','西区','南区','北区']},
{name:'高唐县', areaList:['东区','西区','南区','北区']},
{name:'阳谷县', areaList:['东区','西区','南区','北区']},
{name:'茌平县', areaList:['东区','西区','南区','北区']},
{name:'莘县', areaList:['东区','西区','南区','北区']},
{name:'东阿县', areaList:['东区','西区','南区','北区']},
{name:'冠县', areaList:['东区','西区','南区','北区']}
]}
];