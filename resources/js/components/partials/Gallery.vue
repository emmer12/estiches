<template>
  <div class="portfolio">
    <div class="pofollio">
      <div class="container">
        <div class="heading">
          <h1>Gallery</h1>
        </div>
      </div>
      <br />

      <div style="width: 100%; overflow-x: auto">
        <div class="ui menu">
          <div class="item">
            <div class="ui button" ref="all" @click="filter('all', 'all')">
              All
            </div>
          </div>
          <div class="item" v-for="category in categories" :key="category.id">
            <div
              class="ui button"
              @click="filter('filterByText', category.name)"
            >
              {{ category.name }}
            </div>
          </div>
          <!-- <div class="item"  @click="filter('filterByText','Graduation')">
                      <div class="ui button">Graduation</div>
                    </div>
                    <div class="item"  @click="filter('filterByText','Musical')">
                      <div class="ui button">musical</div>
                    </div>
                    <div class="item"  @click="filter('filterByText','Video')">
                      <div class="ui button">Videos</div>
                    </div> -->
        </div>
      </div>
    </div>
    <div class="grid">
      <isotope
        ref="cpt"
        :options="option"
        :list="galleries"
        v-images-loaded:on.progress="layout"
        class="wow fadeIn"
        @filter="filterOption = arguments[0]"
        :item-selector="'element-item'"
        id="root_isotope"
      >
        <div
          v-for="element in galleries"
          :key="element.id"
          class="grid-items"
          style="padding: 10px; box-shadow: 2px 3px 4px #ccc; margin: 5px"
        >
          <div class="grid-sizer"></div>
          <!-- <LightBox :media="[{src:element.img}]"></LightBox> -->
          <img
            data-toggle="modal"
            :data-target="'#modelId' + element.id"
            v-if="element.category != 'Video'"
            :src="'/storage/uploads/images/' + element.filename"
            :alt="element.category"
            width="100%"
          />
          <div
            class="modal fade"
            :id="'modelId' + element.id"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modelTitleId"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ element.category }}</h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img
                    :src="'/storage/uploads/images/' + element.filename"
                    alt=""
                    width="100%"
                  />
                </div>
              </div>
            </div>
          </div>

          <a
            :href="'/storage/uploads/images/' + element.filename"
            download
            class="download"
          >
            <svg
              width="3em"
              height="3em"
              viewBox="0 0 16 16"
              class="bi bi-arrow-down-circle-fill"
              fill="currentColor"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"
              />
            </svg>
          </a>
        </div>
      </isotope>
    </div>
  </div>
</template>


<script>
import isotope from "vueisotope";
import layout from "isotope-layout";
import imagesLoaded from "vue-images-loaded";
import LightBox from "vue-image-lightbox";
import "vue-image-lightbox/dist/vue-image-lightbox.min.css";
var count = 0;
export default {
  components: {
    isotope,
    LightBox,
  },
  directives: {
    imagesLoaded,
  },
  data() {
    var his = this;
    return {
      layouts: [
        "masonry",
        "fitRows",
        "cellsByRow",
        "vertical",
        "mansoryHorizontal",
        "packery",
        "fitColumn",
        "cellsByColumn",
        "horiz",
      ],
      urls: [
        {
          id: 1,
          img: "/images/works/w1.jpg",
          category: "Wedding",
        },
        {
          id: 2,
          img: "/images/works/w2.jpg",
          category: "Wedding",
        },
        {
          id: 3,
          img: "/images/works/w3.jpg",
          category: "Wedding",
        },
        {
          id: 5,
          img: "/images/works/w5.jpg",
          category: "Graduation",
        },
        {
          id: 6,
          img: "/images/works/w6.jpg",
          category: "Graduation",
        },
        {
          id: 4,
          img: "/images/works/w4.jpg",
          category: "Wedding",
        },
        {
          id: 7,
          img: "/images/works/w7.jpg",
          category: "Graduation",
        },
        {
          id: 8,
          img: "/images/works/w8.jpg",
          category: "Musical",
        },
        {
          id: 9,
          img: "/images/works/w9.jpg",
          category: "Musical",
        },
      ],
      option: {
        getFilterData: {
          all: function () {
            return true;
          },
          filterByText: function (itemElem) {
            if (itemElem == "all") {
              return false;
            }
            return itemElem.category
              .toLowerCase()
              .includes(his.filterText.toLowerCase());
          },
          itemSelector: ".grid-item",
          percentPosition: true,
          mansory: {
            columnWidth: ".grid-sizer",
          },
        },
      },
    };
  },
  methods: {
    filter: function (key, value) {
      this.filterText = value;

      this.$refs.cpt.filter(key);
    },

    layout: function () {
      this.$refs.cpt.layout("masonry");
    },
    getGallery() {
      this.loading = true;
      this.$store.dispatch("getGallery").then(() => {
        this.loading = false;
      });
    },
    getCategory() {
      this.loading = true;
      this.$store.dispatch("getCategory").then(() => {
        this.loading = false;
      });
    },
  },
  mounted() {
    this.getGallery();
    this.getCategory();
  },

  computed: {
    galleries() {
      return this.$store.getters.gallery;
    },
    categories() {
      return this.$store.getters.category;
    },
  },
};
</script>

<style lang="scss" scoped>
.modal-content {
  border-radius: 0px;
  background: rgba($color: #000000, $alpha: 0.5);
}
.modal-header {
  background:rgba($color: #000000, $alpha: 0.8);;
  color: rgba($color: #fff, $alpha: 0.8);
}
.portfolio {
  width: 100%;
  & .grid {
    .element-item {
      box-shadow: 2px 3px 4px #ddd;
      padding: 3px;
      position: relative;
    }
  }
}
.isoDefault {
  position: relative;
  //min-height: 210px;
}
.grid-items,
.grid-sizer {
  width: 32.3%;
  position: relative;
}

.download {
  position: absolute;
  right: 15px;
  bottom: 16px;
  color: #ffffffbf;
  cursor: pointer;
}
@media screen and (max-width: 600px) {
  .grid-items,
  .grid-size {
    width: 45%;

    & img {
      width: 100%;
    }
  }

  .download {
    svg {
      height: 2em;
      width: 2em;
    }
  }
}
</style>