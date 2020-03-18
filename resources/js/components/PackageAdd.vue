<template>
    <div class="w-full text-center">
        <form class="w-full max-w-lg" action="" style="margin: 0 auto" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                    <!--<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="package-url">
                        Package URL
                    </label>-->
                    <input @keyup="validateForm()" v-model.trim="packageUrlInput" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" :class="{'border-red-500' : !packageUrlValidated }" id="package-url" type="text" placeholder="https://github.com/jamesmills/laravel-timezone" autocomplete="off">
                    <p class="text-gray-600 text-xs italic"></p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" style="width: 300px">
                        {{ submitBtnText }}
                    </button>
                </div>
            </div>
        </form>

        <section class="flex flex-wrap justify-center  lg:-mx-2 mt-12">
            <a v-for="(packagedata, index) in recentPackages.slice(0, paginationRecordsLimit)" :href="packagedata.package_url"  class="flex flex-col w-full lg:w-1/4 mt-2 lg:mt-0  overflow-hidden lg:my-2 lg:px-2 shadow-lg cursor-pointer px-2 scale--" target="_blank">
                <div class="rounded overflow-hidden shadow-lg bg-white h-full">
                    <div class="px-6 py-8">
                        <div class="font-bold text-l mb-2 whitespace-no-wrap">{{ packagedata.owner + ' / ' + packagedata.package_name  }}</div>
                        <p class="text-gray-700 text-base h-auto lg:h-24 xl:h-20 overflow-hidden">{{ packagedata.description }}</p>
                        <div class="flex items-center mt-4">
                            <img class="w-10 h-10 rounded-full mr-4" :src="packagedata.owner_avatar_url" :alt="packagedata.owner">
                            <div class="text-sm text-left">
                                <p class="text-black leading-none">{{ packagedata.owner }}</p>
                                <div v-if="parseInt(packagedata.clicks_count) > 0" class="click-badge relative ml-4">
                                    <div class="flex text-black leading-none mt-1">
                                        <img style="width:15px;position:absolute;top:0px;left:-18px;" src="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAA+AAAAOuCAMAAACwq41TAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAANlBMVEUAAAD41k741k741k741k741k741k741k741k741k741k741k741k741k741k741k741k7////St5fzAAAAEHRSTlMAEFBgr++fQI/fMCBwz7+ATiyR+QAAAAFiS0dEEeK1PboAAAAHdElNRQfkAxITOiNlH6TSAAAgEklEQVR42u3dC0LcuBYE0GESAgRC2P9q38tkMglY3e2PZN0rnbMCPjYULqP66y9mcvd3748AaObT594fAdDM57e73h8C0Mjd29un3h8D0MintzcZHUb1+e3trffHADRy//8b3HN0GNPf/7+/3770/iiAJr78uMHve38UQBM/ErqMDmP6J6HL6DCmLz9vcBkdRvQzocvoMKKHf+9vGR0G9PjrBn/q/ZEA1T39usHfvvb+UIDKvv53f7899v5YgMoef9/gMjqM5ndCl9FhNH8kdBkdRvP45w0uo8NY/kzoMjqM5fnd/f320vvjASp6eX+Df+v98QAVfXt/g7899/6AgGo+JHQZHUby8vEGl9FhHB8TuowO41gkdBkdxvGyvMFfe39MQCWflze4kTIYxF3h/jZSBoP4VLrBjZTBGEoJXUaHMRQTuowOY/hUvsFldBhBOaHL6DCCCwldRocR/H3pBjeAAPl9uXSDGymD/O4v3eBGyiC9iwldRof8vly+wWV0yO5yQpfRIbsrCV1Gh+y+XLvBZXTI7enaDW4AAVL7evX+NlIGqT1ev8GNlEFm1xO6jA6Z3UjoMjpk9njrBpfRIa9bCV1Gh7xuJnQZHfJ6uX2DGymDrL7dvsGNlEFSzyvubyNlkNSKhC6jQ1ZrErqMDjmtSugyOuS0KqHL6JDTuoQuo0NGdyvvbwMIkNCntTe4kTLI5/PaG9xIGaSzOqHL6JDP6oQuo0M+6xO6jA7ZbEjoMjpksyGhy+iQzZctN/hb748W2OR+0w1upAwy+XvT/W2kDFLZltCNlEEq2xK6jA6ZbEzoMjpksjGhy+iQydaELqNDHg+b728DCJDGzUmyJSNlkMXtSbIlI2WQw4pJMhkdstqR0GV0yGJPQpfRIYddCV1Ghxx2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" />
                                        <p class=""><span class="">{{ packagedata.clicks_count }}</span> Badge Click<span v-if="parseInt(packagedata.clicks_count) > 1">s</span></p>
                                    </div>
                                </div>
                                <p class="text-black">{{ moment(packagedata.created_at) + ' ago' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </section>

    </div>
</template>

<script>
    import * as moment from 'moment'

    export default {
        name: 'packageAdd',
        data: function() {
            return {
                packageUrlInput: '',
                packageUrlValidated: true,
                submitBtnText: 'Submit',
                recentPackages: [],
                paginationPageNumber: 0,
                paginationRecordsLimit: 4,
            }
        },
        mounted() {
            this.fetchPackages();
        },
        methods: {
            fetchPackages() {
                axios.get('/api/package/' + this.paginationPageNumber).then(res => {
                    (res.data.packages).forEach( (data)=> {
                        this.recentPackages.push(data);
                    });
                }).catch(err => {
                    console.log('package api not responding ! '+ err)
                });
            },
            async submit() {
                if(this.packageUrlInput != '' && this.validURL(this.packageUrlInput) && this.submitBtnText == 'Submit') {

                    this.submitBtnText = 'Investigating Repo...';

                    await axios.post('/api/package', {
                        package_url: this.packageUrlInput
                    }).then(res => {

                        this.recentPackages.unshift(res.data);
                        this.packageUrlInput = '';

                        setTimeout( ()=> {
                            window.swal.fire({
                                title:"Thank you",
                                text: "Package is registered.",
                                type: "success",
                                heightAuto: false
                            });
                        }, 1000)

                    }).catch(err => {

                        window.swal.fire({
                            title: "Error !",
                            text: err.response.data.errors.package_url[0],
                            type: "error",
                            heightAuto: false
                        });

                    }).finally( ()=> {
                        this.submitBtnText = 'Submit';
                    });
                }
                else {
                    this.packageUrlValidated = this.packageUrlInput == '' ? false : true;
                }
            },
            validateForm() {
                this.packageUrlValidated = this.packageUrlInput == '' ? false : true;
            },
            validURL(str) {
                var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
                if(!regex .test(str)) {

                    window.swal.fire({
                        title: "Error !",
                        text: "Please enter valid URL !",
                        type: "error",
                        heightAuto: false
                    });

                    return false;
                } else {
                    return true;
                }
            },
            moment(date) {

                let now = moment.utc(new Date());
                let end = moment.utc(date);

                return moment.duration(end.diff(now)).humanize();
            }
        }
    }
</script>
<style lang="scss" scoped>

    /*.scale-- {*/
    /*    transition: 0.3s all ease-in-out;*/
    /*    transform: scale(1);*/

    /*    &:hover {*/
    /*        transform: scale(1.2);*/
    /*        z-index: 10;*/
    /*    }*/
    /*}*/

</style>
