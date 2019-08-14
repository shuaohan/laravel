<template>
    <div>
        <div style="width:100%">
            <el-button @click="a">点击加载</el-button>
        </div>
        <div class="mycard">
            <el-card :body-style="{ padding: '0px' }" 
            v-for="item in card" :key="item.id"
                style="margin:1%;width:48%;float:left;height:15em">
                <div slot="header">
                    <span>id:{{item.id}}</span>

                </div>
                <div >
                    <div style="width:30%;float:left"><el-image :src="item.picture" :lazy="true" style="height:100%"></el-image></div>
                    <div style="width:70%;float:left;"> <pre v-html="item.content"></pre></div>
                </div>
            </el-card>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                card: []
            }
        },
        methods: {
            a() {
                var _this = this;
                axios.get(
                    'http://192.168.10.10/api/sound'
                ).then(function (respone) {
                    console.log(respone.data);
                    var i;
                    for (i = 0; i < respone.data.per_page; i++) {
                        _this.card.push({
                            id: respone.data.data[i].id,
                            picture: respone.data.data[i].picture,
                            content: '<p>' + respone.data.data[i].content.replace(/\n*$/g, '').replace(
                                /\n/g, '</p> <p>') + '</p>',
                            click: respone.data.data[i].click,
                            ishot: respone.data.data[i].ishot,
                            iscommend: respone.data.data[i].iscommend,
                        });
                    };
                    //console.log(respone.data.total);

                }).catch(function (error) {
                    console.log(error);
                });

            }
        }

    }

</script>
<style scoped>
    pre {
        width: 100% !important;
        text-indent: 2em;
        text-align: left;
        line-height: 34px;
        white-space: inherit;
        color: #2c3e50;
    }

    p {
        line-height: 34px;
    }

    mycard {
        margin: 20px;
        padding: 10px
    }

</style>
