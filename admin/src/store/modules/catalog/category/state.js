export default {
  form : {
    status: true,
    title: '',
    short_description : '',
    banner: null,
    slug: '',
    meta_title: '',
    meta_description : '',
    meta_banner: null
  },
  formRules : {
    valid: true,
    titleRules: [
      v => !!v || 'Title is required',
      v => (v && v.length <= 50) || 'Title must be less than 50 characters',
    ],
    banner_rules: [
      value => !value || value.size < 512000 || 'Avatar size should be less than 512 KB!',
    ], 
    slugRules: [
      v => !!v || 'URL is required',
      v => (v && v.length <= 50) || 'URL must be less than 50 characters',
    ],
    short_description_rules : [v => v.length <= 300 || 'Max 25 characters'],
  },
  list: [
          {
            status: true,
            title: 'Default',
            short_description : '',
            banner: null,
            slug: '',
            meta_title: '',
            meta_description : '',
            meta_banner: null,
            children: [
              {
                status: true,
                title: 'Category one',
                short_description : '',
                banner: null,
                slug: '',
                meta_title: '',
                meta_description : '',
                meta_banner: null,
                children: []
              }
            ]
          },
          {
            status: true,
            title: 'Category two',
            short_description : '',
            banner: null,
            slug: '',
            meta_title: '',
            meta_description : '',
            meta_banner: null,
            children: [
              {
                status: true,
                title: 'Category three',
                short_description : '',
                banner: null,
                slug: '',
                meta_title: '',
                meta_description : '',
                meta_banner: null,
                children: []
              }
            ]
          },
        
    ]
}