import React from "react";
import { createRoot } from "react-dom/client";

const root = ReactDOM.createRoot(document.getElementById("progress-bar"));
root.render(<Widget />);

// Komponen ProgressBar (tetap sama seperti sebelumnya)
const ProgressBar = ({ currentValue, maxValue = 12, label }) => {
    const safeCurrentValue = Math.max(0, currentValue);
    const percentage = (safeCurrentValue / maxValue) * 100;

    let barColorClass = "bg-green-500";
    let textColorClass = "text-green-800";

    if (percentage <= 25) {
        barColorClass = "bg-red-500";
        textColorClass = "text-red-800";
    } else if (percentage <= 50) {
        barColorClass = "bg-yellow-500";
        textColorClass = "text-yellow-800";
    } else if (percentage <= 75) {
        barColorClass = "bg-blue-500";
        textColorClass = "text-blue-800";
    } else {
        barColorClass = "bg-green-500";
        textColorClass = "text-green-800";
    }

    return (
        <div className="w-full max-w-lg mx-auto my-4 p-4 bg-white shadow-lg rounded-lg font-inter">
            <div className="flex justify-between items-center mb-2">
                <span className="text-lg font-semibold text-gray-700">
                    {label}
                </span>
                <span className={`text-md font-bold ${textColorClass}`}>
                    {safeCurrentValue} / {maxValue} Hari (
                    {percentage.toFixed(0)}%)
                </span>
            </div>
            <div className="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                <div
                    className={`h-full rounded-full transition-all duration-500 ease-out ${barColorClass}`}
                    style={{ width: `${percentage}%` }}
                    role="progressbar"
                    aria-valuenow={safeCurrentValue}
                    aria-valuemin="0"
                    aria-valuemax={maxValue}
                ></div>
            </div>
        </div>
    );
};

window.renderProgressBarWidget = (elementId, leaveData) => {
    const container = document.getElementById(elementId);
    if (container) {
        const root = createRoot(container);

        // --- DEBUGGING STEP ---
        // Log data yang diterima langsung di dalam fungsi render React
        console.log("3. Data diterima di React:", leaveData);
        // --- END DEBUGGING STEP ---

        root.render(
            <React.StrictMode>
                <div className="w-full p-4 font-inter">
                    <h1 className="text-3xl font-bold text-gray-800 mb-8 text-center">
                        Progres Sisa Cuti Tahunan
                    </h1>
                    {/* Tambahkan pengecekan apakah leaveData adalah array dan tidak kosong */}
                    {Array.isArray(leaveData) && leaveData.length > 0 ? (
                        leaveData.map((data) => (
                            <ProgressBar
                                key={data.id} // Pastikan data.id unik dan ada
                                currentValue={data.sisa_hari} // Pastikan data.sisa_hari adalah angka
                                maxValue={12}
                                label={`Pegawai ID: ${data.pegawai_id} - Tahun: ${data.tahun}`} // Pastikan data.pegawai_id dan data.tahun ada
                            />
                        ))
                    ) : (
                        // Tampilkan pesan jika tidak ada data
                        <p className="text-center text-gray-600">
                            Tidak ada data sisa cuti yang tersedia untuk
                            ditampilkan.
                        </p>
                    )}
                    {/* Contoh visual tambahan (ini akan selalu muncul) */}
                    <h2 className="text-2xl font-bold text-gray-800 mt-10 mb-6 text-center">
                        Contoh Visual Progress Bar
                    </h2>
                    <ProgressBar
                        currentValue={1}
                        maxValue={12}
                        label="Sisa Cuti: 1 Hari"
                    />
                    <ProgressBar
                        currentValue={4}
                        maxValue={12}
                        label="Sisa Cuti: 4 Hari"
                    />
                    <ProgressBar
                        currentValue={7}
                        maxValue={12}
                        label="Sisa Cuti: 7 Hari"
                    />
                    <ProgressBar
                        currentValue={10}
                        maxValue={12}
                        label="Sisa Cuti: 10 Hari"
                    />
                    <ProgressBar
                        currentValue={12}
                        maxValue={12}
                        label="Sisa Cuti: 12 Hari"
                    />
                </div>
            </React.StrictMode>
        );
    }
};
