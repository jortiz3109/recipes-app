<x-forms.inputs.text
    name="name"
    label="{{ trans('admin.users.name.label') }}"
    value="{{ old('name', $user->name()) }}"
    placeholder="{{ trans('admin.users.name.placeholder') }}"
    autocomplete="off"
    required/>

<x-forms.inputs.email
    name="email"
    label="{{ trans('admin.users.email.label') }}"
    value="{{ old('email', $user->email()) }}"
    placeholder="{{ trans('admin.users.email.placeholder') }}"
    autocomplete="off"
    required/>
