<template>
    <form @submit="formSubmit">
      <div class="offcanvas offcanvas-end" tabindex="-1" id="form-offcanvas" aria-labelledby="form-offcanvasLabel">
        <FormHeader :currentId="currentId" :editTitle="editTitle" :createTitle="createTitle"></FormHeader>
        <div class="offcanvas-body">
  <InputField class="col-md-12" type="text" :is-required="true" :label="$t('variations.lbl_name')" placeholder="" v-model="name" :error-message="errors['name']"></InputField>
  <div class="form-group">
    <label class="form-label" for="type">{{ $t('custom_feild.lbl_type') }} <span class="text-danger">*</span></label>
    <Multiselect v-model="type" :value="type" v-bind="type_data" id="type" autocomplete="off"></Multiselect>
    <span v-if="errorMessages['type']">
      <ul class="text-danger">
        <li v-for="err in errorMessages['type']" :key="err">{{ err }}</li>
      </ul>
    </span>
    <span class="text-danger">{{ errors.type }}</span>
  </div>
  <div class="form-group" v-if="type">
    <div v-for="(input, index) in variationValues" :key="index" class="row align-items-start">
      <div v-if="type == 'color'" class="col">
        <label class="form-label" for="label">{{ $t('variations.lbl_colour') }}</label>
        <input type="color" class="form-control" v-model="input.value.value" />
        <span class="text-danger d-block" v-if="input.value.value === ''">Value is required</span>
      </div>
      <div v-else-if="type == 'text'" class="col">
        <label class="form-label" for="label">{{ $t('variations.lbl_value') }}</label>
        <input type="text" class="form-control" v-model="input.value.value" />
        <span class="text-danger d-block" v-if="input.value.value === ''">Value is required</span>
      </div>
      <div class="col">
        <label class="form-label" for="label">{{ $t('variations.lbl_name') }}</label>
        <input type="text" class="form-control" v-model="input.value.name" />
        <span class="text-danger d-block" v-if="input.value.name === ''">Name is required</span>
      </div>
      <div class="col-auto">
        <a v-if="variationValues.length > 1" class="btn btn-primary" @click="remove(index)">{{ $t('variations.lbl_delete') }}</a>
      </div>
    </div>
    <div class="my-3">
      <button class="btn btn-secondary w-100" type="button" @click="push({ value: '#000000', name: '' })">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> {{ $t('variations.add_values') }}
      </button>
    </div>
  </div>
  <div class="form-group">
    <div class="d-flex justify-content-between align-items-center">
      <label class="form-label" for="category-status">{{ $t('variations.lbl_status') }}</label>
      <div class="form-check form-switch">
        <input class="form-check-input" :value="status" :checked="status" name="status" id="category-status" type="checkbox" v-model="status" />
      </div>
    </div>
  </div>
</div>

      <FormFooter :IS_SUBMITED="IS_SUBMITED"></FormFooter>
      </div>
    </form>
  </template>

  <script setup>
  import { ref, onMounted, reactive } from 'vue'
  import { EDIT_URL, STORE_URL, UPDATE_URL } from '../constant/variation'
  import { useField, useForm, useFieldArray } from 'vee-validate'
  import InputField from '@/vue/components/form-elements/InputField.vue'

  import { useModuleId, useRequest, useOnOffcanvasHide } from '@/helpers/hooks/useCrudOpration'
  import * as yup from 'yup'
  import FormHeader from '@/vue/components/form-elements/FormHeader.vue'
  import FormFooter from '@/vue/components/form-elements/FormFooter.vue'

  // props
  defineProps({
    createTitle: { type: String, default: '' },
    editTitle: { type: String, default: '' }
  })

  const { getRequest, storeRequest, updateRequest, listingRequest } = useRequest()

  // Edit Form Or Create Form
  const currentId = useModuleId(() => {
    if (currentId.value > 0) {
      getRequest({ url: EDIT_URL, id: currentId.value }).then((res) => {
        if (res.status) {
          setFormData(res.data)
        }
      })
    } else {
      setFormData(defaultData())
    }
  })
  useOnOffcanvasHide('form-offcanvas', () => setFormData(defaultData()))

  const type_data = ref({
  searchable: true,
  options: [
    { label: 'Text', value: 'text' },
    { label: 'Color', value: 'color' }
  ],
  closeOnSelect: true
})

  /*
   * Form Data & Validation & Handeling
   */
  // Default FORM DATA
  const defaultData = () => {
    errorMessages.value = {}
    return {
      name: '',
      type: '',
      status: true,
      values: []
    }
  }

  //  Reset Form
  const setFormData = (data) => {
    resetForm({
      values: {
        name: data.name,
        type: data.type,
        status: data.status,
        values: data.values
      }
    })
  }

  // Reload Datatable, SnackBar Message, Alert, Offcanvas Close
  const reset_datatable_close_offcanvas = (res) => {
    IS_SUBMITED.value = false
    if (res.status) {
      window.successSnackbar(res.message)
      renderedDataTable.ajax.reload(null, false)
      bootstrap.Offcanvas.getInstance('#form-offcanvas').hide()
      setFormData(defaultData())
      removeImage()
    } else {
      window.errorSnackbar(res.message)
      errorMessages.value = res.all_message
    }
  }

  // Validations
  const validationSchema = yup.object({
    name: yup.string().required('Name is a required field'),
  })


  const { handleSubmit, errors, resetForm } = useForm({
    validationSchema
  })
  const { value: name } = useField('name')
  const { value: status } = useField('status')
  const { value: type } = useField('type')

  const {fields: variationValues, push, remove} = useFieldArray('values');
  push({value: '', name: ''})

  const errorMessages = ref({})

  onMounted(() => {
    setFormData(defaultData())
  })

  const IS_SUBMITED = ref(false)
  const formSubmit = handleSubmit((values) => {
    console.log(values);
    if (values.type == 'color') {
      const hasEmptyColorName = values.values.some((value) => value.value === '');
      if (hasEmptyColorName) {
        document.querySelector('.color_value_err').textContent = 'Value is required';
        return false;
      }
    }
    if (values.type == 'text') {
      const hasEmptyTextValue = values.values.some((value) => value.value === '');
      if (hasEmptyTextValue) {
        document.querySelector('.text_value_err').textContent = 'Value is required';
        return false;
      }
    }
    const hasEmptyName = values.values.some((value) => value.name === '');
    if (hasEmptyName) {
      document.querySelector('.name_err').textContent = 'Name is required';
      return false;
    }


    if(IS_SUBMITED.value) return false
  IS_SUBMITED.value = true
    if (currentId.value > 0) {
      updateRequest({ url: UPDATE_URL, id: currentId.value, body: values })
        .then((res) => reset_datatable_close_offcanvas(res));
    } else {
      storeRequest({ url: STORE_URL, body: values })
        .then((res) => reset_datatable_close_offcanvas(res));
    }
  });

  </script>
<style scoped>
[type="color"] {
  width: 100%;
  height: 2.5rem;
  border-radius: var(--bs-border-radius);
}
</style>
