<template>
    <div class="search__filter">
        <div class="title-card title-card--variant-3" v-if="type === 'full'">
            <div class="flex-container flex-container--no-padding flex-container--align-bottom flex-container--justify">
                <div class="flex-col flex-col--12 flex-col--tablet--6 flex-col--mobile--6">
                    <h4 class="title-card__title">Results for</h4>

                    <p v-if="$mq !== 'desktop'">
                        <span v-if="!search_term">All services </span><span v-if="search_term">{{search_term}} </span><span v-if="location">in {{location}}</span>
                    </p>
                </div>

                <div class="flex-col flex-col--tablet--6 flex-col--mobile--6 text-right" v-if="$mq !== 'desktop'">
                    <button v-on:click="showFilter()" class="btn btn--small">Edit search</button>
                </div>
            </div>
            
            <div class="title-card__form">
                <div class="title-card__form__header" v-if="$mq !== 'desktop'">
                    <a v-on:click="hideFilter()" class="link link--icon-before"><i class="fa fa-angle-left" aria-hidden></i> Back</a>
                
                    <h4>I'm looking for</h4>
                </div>

                <form action="/results" class="form form--filter" role="search">
                    <div class="flex-container flex-container--no-margin flex-container--no-padding flex-container--no-space">
                        <div class="field flex-col">
                            <p for="search_term" class="field__description">Search</p>
                            <input type="text" name="search_term" placeholder="Enter search term" class="input input--text" v-bind:value="search_term">
                        </div>
                        <div class="field flex-col">
                            <p for="location" class="field__description">Location</p>
                            <input type="text" name="location" placeholder="Postcode" class="input input--text" v-bind:value="location">
                        </div>
                    </div>
                    <div class="flex-container flex-container--no-padding flex-container--align-bottom flex-container--no-space">
                        <div class="field field--no-margin field--checkbox flex-col">
                            <p class="field__description">Cost</p>
                            <div class="checkbox">
                                <input type="checkbox" id="cost-free" name="is_free" class="input input--checkbox" v-bind:value="'false'" v-model="is_free" :checked="is_free">
                                <label for="cost-free"><span><span></span></span> Free</label>
                            </div>
                        </div>
                        <div class="field field--no-margin field--select flex-col">
                            <p class="field__description">Average wait time</p>
                            
                            <select class="select" name="wait_time" v-model="wait_time">
                                <option v-bind:value="'null'">Show all</option>
                                <option v-bind:value="'one_week'">Up to 1 week</option>
                                <option v-bind:value="'two_weeks'">Up to 2 weeks</option>
                                <option v-bind:value="'three_weeks'">Up to 3 weeks</option>
                                <option v-bind:value="'month'">Up to 1 month</option>
                                <option v-bind:value="'longer'">Longer</option>
                            </select>
                        </div>
                        <div class="form__actions flex-col">
                            <button type="submit" class="btn btn--small btn--icon-after">Search <i class="fa fa-search" aria-hidden></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="service" v-if="type === 'sidebar'">
            <div class="service__header">
                <span>
                    <p class="service__name sm-copy color-grey"><i class="fa fa-filter" aria-hidden></i> Filters</p>
                </span>
            </div>

            <div class="service__filter">
                <div class="field field--no-margin field--checkbox flex-col">
                    <div class="checkbox">
                        <input type="checkbox" id="cost-free" name="is_free" class="input input--checkbox" :value="'true'" :checked="is_free" @click="setParameters">
                        <label for="cost-free" tabindex="0"><span><span></span></span> Free</label>
                    </div>
                </div>
            </div>

            <div class="service__filter">
                <div class="field field--no-margin field--select flex-col">
                    <p class="service__name sm-copy color-grey"><i class="fa fa-hourglass-half" aria-hidden></i> Average waiting time</p>
                    
                    <select class="select" name="wait_time" v-model="wait_time" v-on:change="setParameters" tabindex="0">
                        <option v-bind:value="null">Show all</option>
                        <option v-bind:value="'one_week'">Up to 1 week</option>
                        <option v-bind:value="'two_weeks'">Up to 2 weeks</option>
                        <option v-bind:value="'three_weeks'">Up to 3 weeks</option>
                        <option v-bind:value="'month'">Up to 1 month</option>
                        <option v-bind:value="'longer'">Longer</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-form",
        props: ['type', 'search_term', 'location', 'is_free', 'wait_time'],
        methods: {
            setParameters(e) {
                // Push the new URL to history
                if(e.target.name === 'is_free') {
                    history.pushState({
                        id: 'results'
                    }, 'Connected Kingston | Search Results', this.updateQueryStringParameter(e.target.name, e.target.checked));
                } else {
                    history.pushState({
                        id: 'results'
                    }, 'Connected Kingston | Search Results', this.updateQueryStringParameter(e.target.name, e.target.value));
                }
                
                // Reset the search parameters
                this.$parent.setSearchParameters()
                
                // Check what were looking for
                if(this.$parent.category) {
                    this.$parent.getCategory()
                } else if(this.$parent.persona) {
                    this.$parent.getPersona()
                }
            },
            updateQueryStringParameter(key, value) {
                let uri = window.location.href
                let re = new RegExp("([?&])" + key + "=.*?(&|$)", "i")
                let separator = uri.indexOf('?') !== -1 ? "&" : "?"
                if (uri.match(re)) {
                    return uri.replace(re, '$1' + key + "=" + value + '$2')
                }
                else {
                    return uri + separator + key + "=" + value
                }
            },
            showFilter() {
                document.getElementsByTagName("body")[0].classList.add('noscroll')
                document.querySelector('.title-card__form').classList.add('active')
            },
            hideFilter() {
                document.getElementsByTagName("body")[0].classList.remove('noscroll')
                document.querySelector('.title-card__form').classList.remove('active')
            }
        },
        mounted() {
            
        }
    }
</script>
 
<style scoped>
 
</style>