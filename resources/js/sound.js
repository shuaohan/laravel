import Vue from 'vue'
import h from './components/sound.vue'
import { Form,Input,FormItem,Radio,RadioGroup,Button,Upload,Message} from 'element-ui'
//window.$ = window.jQuery = require('jquery');
import $ from 'jquery'
import './axios.js'
window.$=$
window.jquery=$
Vue.component(Form.name,Form)
Vue.component(Input.name,Input)
Vue.component(FormItem.name,FormItem)
Vue.component(Radio.name,Radio)
Vue.component(RadioGroup.name,RadioGroup)
Vue.component(Button.name,Button)
Vue.component(Upload.name,Upload)
Vue.component(Message.name,Message)
Vue.prototype.$message=Message

const vue=new Vue({
    el:'#app',
    render:c=>c(h)
})
