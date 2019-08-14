import Vue from 'vue'
import h from './components/f_sound.vue'
import { Button,Message,Card,Image} from 'element-ui'
//window.$ = window.jQuery = require('jquery');
import $ from 'jquery'
import './axios.js'
window.$=$
window.jquery=$

Vue.component(Button.name,Button)
Vue.component(Card.name,Card)
Vue.component(Image.name,Image)
Vue.component(Message.name,Message)
Vue.prototype.$message=Message

const vue=new Vue({
    el:'#app',
    render:c=>c(h)
})
