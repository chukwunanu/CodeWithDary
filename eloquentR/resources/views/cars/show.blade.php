@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">

        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ $car->name }}

                <p class="text-lg py-6 text-gray-700">
                    {{ $car->headquarters->headquarters }}, {{ $car->headquarters->country }}
                </p>
            </h1>
        </div>

        <div class="text-center py-10">
            <div class="m-auto">

                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    founded: {{ $car->founded }}
                </span>

                <p class="text-lg text-gray-700 py-6">
                    {{$car->description}}
                </p>

                <table class="table-auto m-auto">
                    <tr class="bg-white-500">
                        <th class="w-1/4 border-4 bordeer-gray-500">
                            Model
                        </th>

                        <th class="w-1/4 border-4 bordeer-gray-500">
                            Engines
                        </th>

                        <th class="w-1/4 border-4 bordeer-gray-500">
                            Prod. Date
                        </th>
                    </tr>
                    @forelse ($car->carModels as $model)
                        <tr>
                            <td class="border-4 border-gray-500">
                                {{ $model->model_name }}
                            </td>

                            <td class="border-4 border-gray-500">
                                @foreach ($car->engines as $engine)

                                    @if ($model->id == $engine->model_id)

                                        {{ $engine->engine_type }}

                                    @endif

                                @endforeach
                            </td>

                            <td class="border-4 border-gray-500">
                                {{ optional($car->production_date)->created_at ? date('d-m-y', strtotime(optional($car->production_date)->created_at)) : 'N/A' }}
                            </td>
                        </tr>
                    @empty
                        <p>
                            No car model Found!
                        </p>
                    @endforelse
                </table>

                <hr class="mt-4 mb-8">

            </div>
        </div>

    </div>

@endsection