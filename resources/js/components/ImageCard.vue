<template>
    <a
      class="reka-card"
      :href="link"
      :class="className"
    >
      <div class="reka-card-img-container" :class="className">
        <img
          class="reka-card-img"
          :class="className"
          :src="image"
          :alt="title"
          :title="title"
        />
        <div class="reka-card-title bg-black/50 text-center">
          <h3>{{ title }}</h3>
        </div>
      </div>
    </a>
  </template>
  
  <script setup lang="ts">
  defineProps({
    image: { type: String, required: true },
    title: { type: String, required: true },
    link: { type: String, default: "#" },
    className: { type: String, default: "" }
  });
  </script>
  
  <style scoped>
  .reka-card {
    display: block;
    position: relative;
    width: 100%;
    overflow: hidden;
    transition: box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(70,80,90,0.10);
    text-decoration: none;
  }
  .reka-card-img-container {
    position: relative;
    width: 100%;
    background: #f2f2f2;
  }
  .reka-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s cubic-bezier(.29,.93,.47,.98);
    will-change: transform;
    backface-visibility: hidden;
  }
  .reka-card:hover .reka-card-img {
    transform: scale(1.08) translateY(-6px);
  }
  /* .reka-card-title {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 2;
    color: #bbbbbb;
    padding: 14px 18px 10px 18px;
    text-align: left;
  } */
  .reka-card-title {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    color: #bbb;
    padding: 4px;
  }
 /* .reka-card-title h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    letter-spacing: 0.04em;
  } */
  </style>
  