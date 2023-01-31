<template>
  <CRow>
    <CCol col="md-6">
      <CFormList :service="service" :fields="fields" :title="title" />
    </CCol>
  </CRow>
</template>

<script>
import services from "../../services/factory";
import CFormList from "../../components/form/List";

export default {
  name: "Publishers",
  components: {
    CFormList
  },
  data() {
    return {
      fields: [
        { key: "id", label: "ID" },
        { key: "name", label: "Nombre" },
      ],
      service: services.publisher,
      title: "Lugar de expedición"
    };
  }
};
</script>
