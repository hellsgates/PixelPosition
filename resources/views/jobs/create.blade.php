<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="Manager"/>
        <x-forms.input label="Salary" name="salary" placeholder="$90.000 USD"/>
        <x-forms.input label="Location" name="location" placeholder="Russia, Moscow"/>

        <x-forms.select label="Schedule" name="schedule">
            <option value="" disabled selected>Select Schedule</option>
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
        </x-forms.select>


        <x-forms.input label="URL" name="url" placeholder="https://github.com/hellsgates"/>
        <x-forms.checkbox label="Feature (Extra)" name="featured"/>

        <x-forms.divider/>


        <x-forms.input label="Tags" name="tags" placeholder="SWE, Video"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>

</x-layout>
