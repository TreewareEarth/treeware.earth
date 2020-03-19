<template>
    <div>
        <ais-instant-search :search-client="searchClient" index-name="package_name">
            <ais-search-box placeholder="Owner Name / Package Name " class="searchbox" />
            <br><br>
            <ais-hits>
                <a :href="item.package_url" target="_blank" class="relative w-full flex align-middle" slot="item" slot-scope="{ item }">
                    <div class="flex w-full">
                        <img class="w-10 h-10 rounded-full" :src="item.owner_avatar_url" :alt="item.owner">
                        <div class="flex flex-wrap w-full md:justify-between">
                            <div class="ml-4 mt-0 md:mt-2 w-full md:w-auto">{{ item.owner }}/{{ item.package_name }}</div>
                            <div v-if="item.clicks" class="click-badge relative mt-1 ml-4 lgd:ml-0 md:mt-3 mr-6">
                                <p class="text-xs text-blue-700 font-bold hover:text-blue-600" style="font-size:10px"><span class="">{{ item.clicks }}</span> Badge Click<span v-if="parseInt(item.clicks) > 1">s</span></p>
                            </div>
                        </div>
                    </div>
                </a>
            </ais-hits>
            <div class="pagination"><ais-pagination /></div>
        </ais-instant-search>
        <div class="mt-16 flex text-xs text-white font-bold">
            <svg class="ml-2 fill-current h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"></path></svg>
            <p class="">Badge Clicks shows the number of times someone has clicked the Treeware links from a package README file.</p>
        </div>
    </div>
</template>

<script>
    import algoliasearch from 'algoliasearch/lite';
    import 'instantsearch.css/themes/algolia-min.css';

    export default {
        data() {
            return {
                searchClient: algoliasearch(
                    process.env.MIX_ALGOLIA_APP_ID,
                    process.env.MIX_ALGOLIA_SECRET_SEARCH_ONLY
                ),
            };
        },
    };
</script>

<style lang="scss">
    .ais-SearchBox-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding: .3rem 1.7rem;
        width: 100%;
        position: relative;
        background-color: #fff;
        border: 1px solid #c4c8d8;
        border-radius: 5px;
        padding: 1rem;
        padding-left: 40px;
    }
    .ais-Hits-item, .ais-InfiniteHits-item, .ais-InfiniteResults-item, .ais-Results-item {
        width: 100%;
        background: #fff;
        box-shadow: none;
        margin-top: 0px;
        border-radius: 5px;
        margin-bottom: 3px;
        padding: 0.5rem;
    }

    .pagination {
        margin-top: 30px;
    }

    .searchbox {
        position: relative;

        &:after {
            content: "";
            position: absolute;
            right: 40px;
            top: 19px;
            width: 100px;
            height: 20px;
            background: url('/img/search-by-algolia.png') no-repeat center;
            background-size: contain;
        }

    }

    .ais-SearchBox-reset {
        right: .7rem;
    }

    .ais-SearchBox-submit {
        left: .8rem;
    }

    .ais-Pagination-link {
        background: #fff;
    }

    @media only screen and (max-width: 638px)  {
        .searchbox {
            &:after {
                background: url('/img/algolia.png') no-repeat center;
                background-size: contain;
                right: 0px;
                top: 18px;
            }
        }
        .ais-SearchBox-input {
            font-size: 14px;
        }

        .ais-Hits-item, .ais-InfiniteHits-item, .ais-InfiniteResults-item, .ais-Results-item {
            font-size: 14px;
        }
    }

</style>
